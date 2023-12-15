<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Baby;
use App\Models\Bill;
use App\Models\Dosage;
use App\Models\CheckUp;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\Frequency;
use App\Models\ActivityLog;
use App\Models\MedicineName;
use Illuminate\Http\Request;
use App\Models\MaternalRecord;
use App\Models\MedicineRecord;
use App\Models\DateTimeReasons;
use Illuminate\Validation\Rule;
use App\Models\AppointmentPatient;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;



class PatientController extends Controller
{
    public function records()
    {
        $patients = Patient::where('status', true)->get();

        return view('records', ['patients' => $patients]);
    }

    public function showAppointment()
    {
        $appointments = AppointmentPatient::has('dateTimeReasons')->with('dateTimeReasons')->get();
     
        // Now, $appointments contains only the appointment_patient records with their dateTimeReasons
  
        // You can return a view and pass the $appointments variable to it
        return view('allAppointment', ['appointments' => $appointments]);  
    }
    
    public function index()
    {
        // Calculate the start and end dates of the current week
        $currentWeekStartDate = Carbon::now()->startOfWeek();
        $currentWeekEndDate = Carbon::now()->endOfWeek();
    
        // Retrieve all AppointmentPatient records with DateTimeReasons for appointments within the current week
        $appointments = AppointmentPatient::whereHas('dateTimeReasons', function ($query) use ($currentWeekStartDate, $currentWeekEndDate) {
            $query->whereBetween('appointment_date', [$currentWeekStartDate, $currentWeekEndDate]);
        })->with('dateTimeReasons')->get();
    
        // Retrieve bill data
        $billsData = Bill::select('total_amount', 'created_at')->get();
    
        // Calculate the total count of AppointmentPatient records
        $totalAppointments = AppointmentPatient::count();
    
        // Calculate the total bill amount for each month
        $monthlyBillAmounts = Bill::selectRaw('SUM(total_amount) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    
        // Retrieve the count of patients from the "patients" table
        $patientCount = Patient::where('status', true)->count();


        $patientsWithTrueCheckup = Patient::whereHas('checkups', function ($query) {
            $query->where('status', true);
        })->count();
    
        // Calculate monthly counts
        $monthlyCounts = Patient::selectRaw('MONTH(created_at) as month, COUNT(id) as count')
        ->where('status', true) // Add this line to filter by status
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    
        return view('index', [
            'appointments' => $appointments,
            'monthlyBillAmounts' => $monthlyBillAmounts,
            'patientCount' => $patientCount,
            'appointmentCount' => $totalAppointments,
            'activePatient' => $patientsWithTrueCheckup,
            'monthlyCounts' => $monthlyCounts,
        ]);
    }
    
    public function create(Request $request)
    {
        $patients = Patient::where('status', true)->get();

        return view('create', ['patients' => $patients]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'midlename' => 'nullable',
            'age' => 'required|integer',
            'birthday' => 'required',
            'civilstatus' => 'required',
            'contact' => [
                'required',
                Rule::unique('patients')->where(function ($query) use ($request) {
                    return $query->where('firstname', $request->input('firstname'))
                                 ->where('lastname', $request->input('lastname'))
                                 ->where('contact', $request->input('contact'));
                }),
            ],
            'address' => 'required',
            'philhealth_beneficiary' => 'required|boolean',
        ]);
    
        // Map the 'philhealth_beneficiary' input to 1 for 'Yes', and 0 for 'No'
        $philhealthBeneficiaryValue = $request->input('philhealth_beneficiary') === '1' ? 1 : 0;
    
        // Add the 'status' field with a default value of true
        $patientData = array_merge($validatedData, [
            'status' => true,
            'philhealth_beneficiary' => $philhealthBeneficiaryValue, // Store the mapped value
        ]);
    
        // Store the patient data
        $patient = Patient::create($patientData);
    
        // Get the appointment ID from the form input
        $appointmentId = $request->input('appointment_id');
    
        // Find the corresponding appointment_patient record
        $appointmentPatient = AppointmentPatient::find($appointmentId);
    
        // Check if the appointment_patient record exists
        if ($appointmentPatient) {
            // Delete the found appointment_patient record
            $appointmentPatient->delete();
        }   
        // Create an account for the patient
        $username = 'P' . str_pad($patient->id, 6, '0', STR_PAD_LEFT);
        $defaultPassword = 'password123'; // You can set any default password you prefer
        $hashedPassword = Hash::make($defaultPassword);
    
        // Save the patient account details
        $patient->account()->create([
            'username' => $username,
            'password' => $hashedPassword,
        ]);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Created patient', // Customize the action as needed
            'patient_id' => $patient->id,
        ]);
    
        return redirect()->route('admin.ViewRecord', ['id' => encrypt($patient->id)])->with('success', 'Patient data and account created successfully!');

    }
    
    public function edit($encryptedId)
    {
        // Decrypt the encrypted ID to get the original ID
        $id = decrypt($encryptedId);
    
        $patient = Patient::findOrFail($id);
        // dd($patient);
        return view('edit_patient', ['patient' => $patient]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'midlename' => 'nullable',
            'age' => 'required|integer',
            'birthday' => 'required',
            'civilstatus' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validatedData);

        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Update Record', // Customize the action as needed
            'patient_id' => $patient->id,
        ]);
        return redirect()->route('admin.records', ['id' => $id])->with('success', 'Patient data updated successfully!');
    }

    public function delete($encryptedId)
    {
        // Decrypt the encrypted ID to get the original ID
        $id = decrypt($encryptedId);
    
        $patient = Patient::findOrFail($id);
        // dd($patient);
        return view('delete_patient', ['patient' => $patient]);
    }
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        // Set the patient's status to false
        $patient->status = false;
        $patient->save();

        // Optionally, delete the associated account if it exists
        if ($patient->account) {
            $patient->account->delete();
        }
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Delete Record', // Customize the action as needed
            'patient_id' => $patient->id,
        ]);

        return redirect()->route('admin.records')->with('success', 'Patient and associated account "deleted" successfully!');
    }

    public function viewAccounts()
    {
        $patientsWithAccounts = Patient::where('status', true)
            ->with('account')
            ->get();

        return view('accounts', ['patientsWithAccounts' => $patientsWithAccounts]);
    }

    public function showMaternalRecord($id)
    {
        // Decrypt the id
        $id = decrypt($id);
    
        $patient = Patient::findOrFail($id);
    
        // Retrieve the maternal record with true status (if it exists)
        $maternalRecord = $patient->maternalRecords()->where('status', true)->first();
    
        // Retrieve maternal records with false status
        $maternalRecordsFalse = $patient->maternalRecords()->where('status', false)->get();
    
        // Retrieve the latest checkup record for the patient
        $latestCheckup = CheckUp::with('medicineRecords')->where('patient_id_checkup', $patient->id)->latest()->first();
    
        return view('maternal', [
            'patient' => $patient,
            'maternalRecord' => $maternalRecord,
            'maternalRecordsFalse' => $maternalRecordsFalse,
            'latestCheckup' => $latestCheckup
        ]);
    }
    public function prevMaternalRecord($id)
    {
        // Decrypt the id
        $id = decrypt($id);
    
        $patient = Patient::findOrFail($id);
    
    
        // Retrieve maternal records with false status
        $maternalRecord = $patient->maternalRecords()->where('status', false)->get();
    

        return view('prevMaternal', [
            'patient' => $patient,
            'maternalRecord' => $maternalRecord,
        ]);
    }
    
    public function storeMaternalRecord(Request $request, $id)
    {
        // Validation for form fields
        $validatedData = $request->validate([
            'medical-history' => 'required',
            'lmp' => 'required|date',
            // Add more validation rules for other maternal record fields
        ]);

        // Use try-catch block to handle any errors during database save
        try {
            $patient = Patient::findOrFail($id);

            // Create a new maternal record for the patient
            $maternalRecord = MaternalRecord::create([
                'patient_id_maternal' => $patient->id,
                'medical_history' => $validatedData['medical-history'],
                'lmp' => $validatedData['lmp'],
                // Add other maternal record fields
                'edc' => $request->input('edc'),
                'aog' => $request->input('aog'),
                'fht' => $request->input('fht'),
                'pres' => $request->input('pres'),
                'st' => $request->input('st'),
                'effacement' => $request->input('effacement'),
                'cervical_dilatation' => $request->input('cervical_dilatation'),
                'bp' => $request->input('bp'),
                'bow' => $request->input('bow'),
                'color' => $request->input('color'),
                'time_rupture' => $request->input('time-rupture'),
                'condition' => $request->input('condition'),
                'gravidity' => $request->input('gravidity'),
                'parity' => $request->input('parity'),
                'status' => true, // Set the 'status' field to true
            ]);
            ActivityLog::create([
                'user_id' => Auth::id(), // Assuming you have user authentication
                'action' => 'Add Meternal For', // Customize the action as needed
                'patient_id' => $patient->id,
            ]);
    
            // Now, retrieve maternal records with status set to true for this patient
                 

            // Redirect back to the patient's maternal page after successful save
            return redirect()->route('admin.maternal', ['id' => encrypt($patient->id)])->with('success', 'Maternal record added successfully!');

        } catch (\Exception $e) {
            // If an error occurs, dump the error message for debugging
            dd($e->getMessage());
        }
    }


    public function editMaternalRecord($id)
    {
        $id = decrypt($id);
        // Find the patient and their associated maternal record
        $patient = Patient::findOrFail($id);
        $maternalRecord = MaternalRecord::where('patient_id_maternal', $patient->id)->first();

        // Return the view with the patient and maternal record data
        return view('editMaternalForm', compact('patient', 'maternalRecord'));
    }

    public function updateMaternalRecord(Request $request, $id)
    {
        // Validation for form fields
        $validatedData = $request->validate([
            'medical-history' => 'required',
            'lmp' => 'required|date',
            // Add more validation rules for other maternal record fields
        ]);

        // Use try-catch block to handle any errors during database update
        try {
            $patient = Patient::findOrFail($id);

            // Find the existing maternal record associated with the patient
            $maternalRecord = MaternalRecord::where('patient_id_maternal', $patient->id)->first();

            // Check if the maternal record exists
            if (!$maternalRecord) {
                return redirect()->back()->with('error', 'Maternal record not found.');
            }

            // Update the maternal record with the validated data
            $maternalRecord->update([
                'lmp' => $validatedData['lmp'],
                // Add other maternal record fields to update
                'edc' => $request->input('edc'),
                'aog' => $request->input('aog'),
                'fht' => $request->input('fht'),
                'pres' => $request->input('pres'),
                'st' => $request->input('st'),
                'effacement' => $request->input('effacement'),
                'cervical_dilatation' => $request->input('cervical_dilatation'),
                'bp' => $request->input('bp'),
                'bow' => $request->input('bow'),
                'color' => $request->input('color'),
                'time_rupture' => $request->input('time-rupture'),
                'condition' => $request->input('condition'),
                'gravidity' => $request->input('gravidity'),
                'parity' => $request->input('parity'),
                'medical_history' => $validatedData['medical-history'],
            ]);
  
            // Redirect back to the patient's maternal page after successful update
            $encryptedPatientId = Crypt::encrypt($patient->id);

            return redirect()->route('admin.maternal', ['id' => $encryptedPatientId])->with('success', 'Maternal record updated successfully!');        } catch (\Exception $e) {
            // If an error occurs, redirect back with an error message and dump the error for debugging
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update maternal record.');
        }
    }

    public function showDeleteConfirmation($id)
    {
        $patient = Patient::findOrFail($id);
        $maternalRecord = MaternalRecord::where('patient_id_maternal', $patient->id)->first();

        return view('delete-maternal', compact('patient', 'maternalRecord'));
    }

    public function deleteMaternalRecord($patientId, $maternalRecordId)
    {
        try {
            $maternalRecord = MaternalRecord::findOrFail($maternalRecordId);
            $maternalRecord->delete();
    
            $encryptedPatientId = Crypt::encrypt($patientId);
            ActivityLog::create([
                'user_id' => Auth::id(), // Assuming you have user authentication
                'action' => 'Delete Maternal Record For', // Corrected action text
                'patient_id' => $patientId, // Use the correct variable $patientId
            ]);
            return redirect()->route('admin.maternal', ['id' => $encryptedPatientId])->with('success', 'Maternal record deleted successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log the error message
            return redirect()->back()->with('error', 'Failed to delete maternal record.');
        }
    }
    


    public function printMaternalRecord($id)
    {
        $id = decrypt($id);
        $patient = Patient::findOrFail($id);
        $maternalRecord = MaternalRecord::where('patient_id_maternal', $patient->id)->first();

        // Return the view with the patient and maternal record data
        return view('print-maternal', compact('patient', 'maternalRecord'));
    }


    public function showChildForm($id)
    {
        $id = decrypt($id);
        $patient = Patient::findOrFail($id);
        
        // Retrieve the child record with a true status
        $baby = Baby::where('patient_id_baby', $patient->id)
            ->where('status', true)
            ->first();
        
        // Retrieve the child records with a false status
        $babyFalse = Baby::where('patient_id_baby', $patient->id)
            ->where('status', false)
            ->get();
    
        return view('child', compact('patient', 'baby', 'babyFalse'));
    }
    public function prevChildForm($id)
    {
        $id = decrypt($id);
        $patient = Patient::findOrFail($id);
        
  
        
        // Retrieve the child records with a false status
        $baby = Baby::where('patient_id_baby', $patient->id)
            ->where('status', false)
            ->get();

        return view('prevChild', compact('patient', 'baby'));
    }
    



    public function storeBabyInformation(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        // Create a new baby record for the patient
        $baby = Baby::create([
            'patient_id_baby' => $patient->id,
            'babyLastName' => $request->input('babyLastName'),
            'babyGivenName' => $request->input('babyGivenName'),
            'babyMiddleName' => $request->input('babyMiddleName'),
            'babyAddress' => $request->input('babyAddress'),
            'babyDOB' => $request->input('babyDOB'),
            'babyTOB' => $request->input('babyTOB'),
            'babyAge' => $request->input('babyAge'),
            'babyGender' => $request->input('babyGender'),
            'babyNationality' => $request->input('babyNationality'),
            'phic' => $request->input('phic'),
            'fatherLastName' => $request->input('fatherLastName'),
            'fatherFirstName' => $request->input('fatherFirstName'),
            'fatherMiddleName' => $request->input('fatherMiddleName'),
            'status' => true, // Set the 'status' field to true
            // Add other baby fields as needed
        ]);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Add Baby Record For', // Corrected action text
            'patient_id' => $id, // Use the correct variable $patientId
        ]);
        // Load the patient with the baby relationship


        // Redirect back to the patient's child form after successful save
        return redirect()->route('admin.child', ['id' => encrypt($patient->id)])->with('success', 'Baby information added successfully!');

    }

    public function editbaby($encryptedId)
    {
        // Decrypt the encrypted ID to get the original ID
        $id = decrypt($encryptedId);
    
        // Find the patient and their associated baby record
        $patient = Patient::findOrFail($id);
        $baby = Baby::where('patient_id_baby', $patient->id)->first();
    
        // Return the view with the patient and baby data
        return view('edit-baby', compact('patient', 'baby'));
    }
    

    public function updateBaby(Request $request, $id)
    {
        // Validation for form fields
        $validatedData = $request->validate([
            'babyLastName' => 'required',
            'babyGivenName' => 'required',
            // Add more validation rules for other baby fields if needed
        ]);

        try {
            $patient = Patient::findOrFail($id);

            // Find the baby record
            $baby = Baby::where('patient_id_baby', $patient->id)->first();

            // Update the baby record attributes
            $baby->update([
                'babyLastName' => $validatedData['babyLastName'],
                'babyGivenName' => $validatedData['babyGivenName'],
                'babyMiddleName' => $request->input('babyMiddleName'),
                'babyAddress' => $request->input('babyAddress'),
                'babyDOB' => $request->input('babyDOB'),
                'babyTOB' => $request->input('babyTOB'),
                'babyAge' => $request->input('babyAge'),
                'babyGender' => $request->input('babyGender'),
                'babyNationality' => $request->input('babyNationality'),
                'phic' => $request->input('phic'),
                'fatherLastName' => $request->input('fatherLastName'),
                'fatherFirstName' => $request->input('fatherFirstName'),
                'fatherMiddleName' => $request->input('fatherMiddleName'),
                // Add other baby fields to update
            ]);
            ActivityLog::create([
                'user_id' => Auth::id(), // Assuming you have user authentication
                'action' => 'Update Baby Record For', // Corrected action text
                'patient_id' => $id, // Use the correct variable $patientId
            ]);
            $encryptedId = encrypt($id);

            return redirect()->route('admin.child', ['id' => $encryptedId])->with('success', 'Baby information updated successfully!');
        } catch (\Exception $e) {
            // If an error occurs, redirect back with an error message and dump the error for debugging
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update baby information.');
        }
    }

    public function confirmDeleteBaby($id, $babyId)
    {
        $decryptedId = decrypt($id);
        $decryptedBabyId = decrypt($babyId);
    
        $patient = Patient::findOrFail($decryptedId);
        $baby = Baby::where('patient_id_baby', $patient->id)->findOrFail($decryptedBabyId);
    
        return view('delete-baby', compact('patient', 'baby'));
    }
    

    public function deleteBabyRecord($id, $babyId)
    {
        // Find the patient and baby record
        $patient = Patient::findOrFail($id);
        $baby = Baby::where('patient_id_baby', $patient->id)->findOrFail($babyId);

        // Delete the baby record
        $baby->delete();
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Delete Baby Record For', // Corrected action text
            'patient_id' => $id, // Use the correct variable $patientId
        ]);

        return redirect()->route('admin.child', ['id' => encrypt($patient->id)])->with('success', 'Baby record deleted successfully!');

    }

    public function printBaby($id, $babyId)
    {
        $decryptedId = decrypt($id);
        $decryptedBabyId = decrypt($babyId);
    
        $patient = Patient::findOrFail($decryptedId);
        $baby = Baby::where('patient_id_baby', $patient->id)->findOrFail($decryptedBabyId);
    
        return view('print-baby', compact('patient', 'baby'));
    }
    



    public function storeCheckup(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'visit-date' => 'required|date',
            'visit-time' => 'required|date_format:H:i',
            'reason' => 'required|string',
            'next-visit' => 'nullable|date',
            'lmp' => 'nullable|date',
            'aog' => 'nullable|',
            'edc' => 'nullable|date',
            'bp' => 'nullable|string',
            'weight' => 'nullable|',
            'fh' => 'nullable|string',
            'fht' => 'nullable|string',
        ]);



        // Create a new CheckUp record
        $checkup = new CheckUp();
        $checkup->patient_id_checkup = $id;
        $checkup->visit_date = $validatedData['visit-date'];
        $checkup->visit_time = $validatedData['visit-time'];
        $checkup->reason = $validatedData['reason'];
        $checkup->next_visit = $validatedData['next-visit'];
        $checkup->lmp = $validatedData['lmp'];
        $checkup->aog = $validatedData['aog'];
        $checkup->edc = $validatedData['edc'];
        $checkup->bp = $validatedData['bp'];
        $checkup->weight = $validatedData['weight'];
        $checkup->fh = $validatedData['fh'];
        $checkup->fht = $validatedData['fht'];
        $checkup->status = true;
        $checkup->save();

        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Add Checkup Record For', // Corrected action text
            'patient_id' => $id, // Use the correct variable $patientId
        ]);


        // Redirect back or to another page
        return redirect()->route('admin.checkupmed', ['id' => encrypt($id)])->with('success', 'Checkup record saved successfully');

    }



    public function showCheckupForm($id)
    {
        $decryptedId = decrypt($id);
        $patient = Patient::findOrFail($decryptedId);
    
        // Retrieve the latest checkup record with a true status
        $checkup = CheckUp::where('patient_id_checkup', $patient->id)
            ->where('status', true)
            ->latest()
            ->first();
    
        return view('checkup', compact('patient', 'checkup'));
    }
    

    public function showCheckup($id)
    {
        $decryptedId = decrypt($id); // Decrypt the $id
        $patient = Patient::findOrFail($decryptedId); // Use the decrypted $id
        $checkup = CheckUp::with('medicineRecords')->where('patient_id_checkup', $patient->id)->latest()->first();
        $allcheckup = CheckUp::with('medicineRecords')->where('patient_id_checkup', $patient->id)->first();
        $medicineOptions = MedicineName::all();
        $frequencies = Frequency::all();
        $dosages = Dosage::all();
    
        return view('checkup-med', compact('patient', 'checkup', 'medicineOptions', 'frequencies', 'dosages'));
    }
    
    public function checkupHistory($id)
    {
        // Decrypt the patient's ID
        $decryptedId = decrypt($id);
    
        // Fetch the patient's checkup history and associated medicine here
        $patient = Patient::findOrFail($decryptedId);
        $checkup = CheckUp::with('medicineRecords')->where('patient_id_checkup', $patient->id)->get();
    
        return view('checkup-history', compact('patient', 'checkup'));
    }
    


    public function addMedicine(Request $request, $id)
{
    // Validate the request data if needed
    $checkup = CheckUp::findOrFail($id);

    $existingMedicine = $checkup->medicineRecords()
        ->where('medicine_name', $request->input('medicine_name'))
        ->where('dosage', $request->input('dosage'))
        ->where('frequency', $request->input('frequency'))
        ->exists();

    if ($existingMedicine) {
        return redirect()->back()->with('error', 'Medicine record already exists for this checkup');
    }

    $medicine = new MedicineRecord([
        'medicine_name' => $request->input('medicine_name'),
        'dosage' => $request->input('dosage'),
        'frequency' => $request->input('frequency'),
    ]);

    $checkup->medicineRecords()->save($medicine);

    $patientId = $checkup->patient->id;
    ActivityLog::create([
        'user_id' => Auth::id(),
        'action' => 'Add Medicine For',
        'patient_id' => $patientId,
    ]);

    return redirect()->back()->with('success', 'Medicine record added successfully');
}

    public function updateCheckup(Request $request, $id, $checkupId)
    {
        $patient = Patient::findOrFail($id);
        $checkup = CheckUp::findOrFail($checkupId);

        // Update checkup details here using the data from the request
        $checkup->visit_date = $request->input('visit-date');
        $checkup->visit_time = $request->input('visit-time');
        $checkup->reason = $request->input('reason');
        $checkup->next_visit = $request->input('next-visit');
        $checkup->bp = $request->input('bp');
        $checkup->lmp = $request->input('lmp');
        $checkup->aog = $request->input('aog');
        $checkup->edc = $request->input('edc');
        $checkup->weight = $request->input('weight');
        $checkup->fht = $request->input('fht');
        $checkup->fh = $request->input('fh');
        $checkup->save();
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Update Checkup Record For', // Corrected action text
            'patient_id' => $id, // Use the correct variable $patientId
        ]);
       // Encrypt the patient ID
$encryptedId = Crypt::encrypt($patient->id);

// Redirect with the encrypted ID and success message
return redirect()->route('admin.checkupmed', ['id' => $encryptedId])->with('success', 'Checkup details updated successfully');
    }


    public function deleteCheckup($checkupId)
{
    $checkup = CheckUp::find($checkupId);

    if (!$checkup) {
        // Check if the record is not found (it may have already been deleted)
        return redirect()->route('admin.checkup')->with('success', 'Checkup record does not exist');
    }

    $patientId = $checkup->patient->id; // Assuming you can access the patient ID

    $checkup->delete();

    ActivityLog::create([
        'user_id' => Auth::id(),
        'action' => 'Delete Checkup Record For',
        'patient_id' => $patientId,
    ]);

    // Redirect to the 'checkup' route with the appropriate patient ID
    return redirect()->route('admin.checkup', ['id' => encrypt($patientId)])->with('success', 'Checkup record deleted successfully');
}

    

    

    
    public function deleteMedicine($id, $medicineId)
    {
        $patient = Patient::findOrFail($id);
        $medicine = MedicineRecord::findOrFail($medicineId);

        $medicine->delete();
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Delete Medicine For', // Corrected action text
            'patient_id' => $id, // Use the correct variable $patientId
        ]);
            // Encrypt the patient ID
            $encryptedId = Crypt::encrypt($patient->id);

            // Redirect with the encrypted ID and success message
            return redirect()->route('admin.checkupmed', ['id' => $encryptedId])->with('success', 'Medicine record deleted successfully');
                }


    public function showPrintCheckup($id)
    {
        $patient = Patient::findOrFail($id);
        $checkup = CheckUp::with('medicineRecords')->where('patient_id_checkup', $patient->id)->first();

        return view('print-checkup-form', compact('patient', 'checkup'));
    }

    public function showAdmissionForm($id)
    {
        $id = decrypt($id);
        $patient = Patient::findOrFail($id);
    
        // Retrieve the admission record with a true status
        $admission = Admission::where('patient_id_addmit', $patient->id)
            ->where('status', true)
            ->first();
    
        // Retrieve the admission records with a false status
        $admissionFalse = Admission::where('patient_id_addmit', $patient->id)
            ->where('status', false)
            ->get();
    
        return view('addmit', compact('patient', 'admission', 'admissionFalse'));
    }

    public function prevAdmissionForm($id)
    {
        $id = decrypt($id);
        $patient = Patient::findOrFail($id);

        // Retrieve the admission records with a false status
        $admission = Admission::where('patient_id_addmit', $patient->id)
            ->where('status', false)
            ->get();
    
        return view('prevAddmit', compact('patient', 'admission'));
    }
    
    
    public function storeAdmission(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'admission-date' => 'required|date',
            'admission-diagnosis' => 'required',
            'services-performed' => 'nullable',
            'final-diagnosis' => 'nullable',
        ]);

        // Create a new Admission record and fill it with the form data
        $admission = new Admission();
        $admission->patient_id_addmit = $id;
        $admission->admission_date = $request->input('admission-date');
        $admission->admission_diagnosis = $request->input('admission-diagnosis');
        $admission->services_performed = $request->input('services-performed', null);
        $admission->final_diagnosis = $request->input('final-diagnosis', null);

        // Check if 'discharge-date' is provided in the form data
        if ($request->has('discharge-date')) {
            $admission->discharge_date = $request->input('discharge-date');
        }
        $admission->status = true;

        // Save the Admission record
        $admission->save();
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Add Admission Record For', // Corrected action text
            'patient_id' => $id, // Use the correct variable $patientId
        ]);

        return redirect()->route('admin.addmit', ['id' => encrypt($id)])->with('success', 'Admission record saved successfully');

    }


    public function editAdmissionForm($id)
    {
        $id = decrypt($id);
        $patient = Patient::findOrFail($id);
        $admission = Admission::where('patient_id_addmit', $patient->id)->first();

        return view('editAdmission', ['patient' => $patient, 'admission' => $admission]);
    }

    public function updateAdmission(Request $request, $id)
    {
        // Validation for form fields
        $validatedData = $request->validate([
            'admission-date' => 'required|date',
            'discharge-date' => 'required|date|after:admission-date',
            'admission-diagnosis' => 'required',
            'services-performed' => 'required',
            'final-diagnosis' => 'required',
            // Add more validation rules for other admission fields if needed
        ]);

        try {
            $patient = Patient::findOrFail($id);

            // Find the admission record
            $admission = Admission::where('patient_id_addmit', $patient->id)->first();

            // Update the admission record attributes
            $admission->update([
                'admission_date' => $validatedData['admission-date'],
                'discharge_date' => $validatedData['discharge-date'],
                'admission_diagnosis' => $validatedData['admission-diagnosis'],
                'services_performed' => $validatedData['services-performed'],
                'final_diagnosis' => $validatedData['final-diagnosis'],
                // Add other admission fields to update
            ]);
            ActivityLog::create([
                'user_id' => Auth::id(), // Assuming you have user authentication
                'action' => 'Update Admission Record For', // Corrected action text
                'patient_id' => $id, // Use the correct variable $patientId
            ]);

            return redirect()->route('admin.addmit', ['id' => encrypt($patient->id)])->with('success', 'Admission information updated successfully!');

        } catch (\Exception $e) {
            // If an error occurs, redirect back with an error message and dump the error for debugging
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update admission information.');
        }
    }


    public function deleteAdmission($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $admission = Admission::where('patient_id_addmit', $patient->id)->first();

            // Delete the admission record
            $admission->delete();
            ActivityLog::create([
                'user_id' => Auth::id(), // Assuming you have user authentication
                'action' => 'Delete Admission Record For', // Corrected action text
                'patient_id' => $id, // Use the correct variable $patientId
            ]);

            return redirect()->route('admin.addmit', ['id' => encrypt($patient->id)])->with('success', 'Admission record deleted successfully.');
        } catch (\Exception $e) {
            // Handle any errors here
            return redirect()->back()->with('error', 'Failed to delete admission record.');
        }
    }

    public function printAdmission($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $admission = Admission::where('patient_id_addmit', $patient->id)->first();

            // Load the print view with admission details
            return view('printAdmission', compact('patient', 'admission'));
        } catch (\Exception $e) {
            // Handle any errors here
            return redirect()->back()->with('error', 'Failed to load print view.');
        }
    }

    public function Viewrecord($id)
    {
        $id = decrypt($id);
       
        $patient = Patient::findOrFail($id);
        // dd($patient);
        return view('record-view', ['patient' => $patient]);
    }
    public function referral()
    {
        $patients = Patient::where('status', true)->get();

        return view('patients', ['patients' => $patients]);
    }

    public function ReferralForm($id)
    {

        $patient = Patient::findOrFail($id);
        // dd($patient);
        return view('print-referral', ['patient' => $patient]);
    }
    public function dischargeAllRecords($patientId)
    {
        $patientId = decrypt($patientId);
        // Find the patient by ID
        $patient = Patient::findOrFail($patientId);
    
        $admission = Admission::where('patient_id_addmit', $patient->id)->first();
        
        // Discharge all associated records (assuming you have relationships set up)
        $patient->admissions()->update(['status' => false]);
        $patient->checkups()->update(['status' => false]);
        $patient->maternalRecords()->update(['status' => false]);
        $patient->babies()->update(['status' => false]);
        $patient->bills()->update(['status' => false]);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Discharge Patient ', // Corrected action text
            'patient_id' => $patientId, // Use the correct variable $patientId
        ]);
    
        // Redirect to the printBillPreview route with the correct parameter name
        return redirect()->route('admin.BillPreview', ['patientId' => encrypt($patient->id)])->with('success', 'All records discharged successfully!');

    }
    
  

    public function resetAccount(Request $request, $id)
{
    // Find the patient by ID
    $patient = Patient::findOrFail($id);

    // Generate a new username
    $newUsername = 'P' . str_pad($patient->id, 6, '0', STR_PAD_LEFT);

    // Generate a new password (you can use any method to generate a new password)
    $newPassword = 'password123';

    // Hash the new password
    $hashedPassword = Hash::make($newPassword);

    // Update the patient's account with the new username and hashed password
    $patient->account()->update([
        'username' => $newUsername,
        'password' => $hashedPassword,
    ]);
    ActivityLog::create([
        'user_id' => Auth::id(), // Assuming you have user authentication
        'action' => 'Reset Portal Account', // Corrected action text
        'patient_id' => $id, // Use the correct variable $patientId
    ]);

    return redirect()->back()->with('success', 'Account reset successfully.');
}
public function adminLogout(Request $request)
{
    Auth::logout(); // Log the user out
    $request->session()->flush(); // Clear the session

    return redirect()->route('admin.login'); // Redirect to the login page
}

    public function showChangePasswordForm()
    {
        return view('adminChangePass');
    }
    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);
    
        // Get the currently authenticated account
        $authenticatedAdmin = Auth::guard('admin')->user();
    
        // Check if the current password is correct
        if (Hash::check($request->current_password, $authenticatedAdmin->password)) {
            // Set the new password
            $authenticatedAdmin->password = Hash::make($request->new_password);
    
            // Save the changes to the Admin
            $authenticatedAdmin->save();
    
            return redirect()->route('admin.login')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('admin.changePassForm')->with('error', 'Current password is incorrect.');
        }
    }
    public function logs()
    {
        // Retrieve activity logs with user and patient information and order them by the latest first
        $activityLogs = ActivityLog::with(['user', 'patient'])
        ->whereNotNull('patient_id')
        ->orderBy('created_at', 'desc')
        ->get();
    
    
        return view('Activitylogs', [
            'activityLogs' => $activityLogs,
        
        ]);
    }
    
    public function Otherlogs(Request $request)
    {
        $startDate = $request->input('start');
        $endDate = $request->input('end');
    
        $query = ActivityLog::with(['user', 'patient'])
            ->whereNull('patient_id');
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $logsWithNullPatientId = $query->orderBy('created_at', 'desc')->get();
    
        return view('Otherlogs', [
            'logsWithNullPatientId' => $logsWithNullPatientId,
        ]);
    }
    
    
    
    

}
