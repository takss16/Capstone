<?php


namespace App\Http\Controllers;
use App\Models\Baby;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MaternalRecord;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;




class PatientController extends Controller
{
    public function records()
    {
        $patients = Patient::all();

        return view('records', ['patients' => $patients]);
    }
    

    public function create(Request $request)
    {
        $patients = Patient::all();

        return view('create', ['patients' => $patients]);
    }

    
    public function searchPatients(Request $request)
{
    $query = $request->input ('query');

    // Perform the search query based on the user's input
    $patients = Patient::where('firstname', 'like', '%' . $query . '%')
                       ->orWhere('lastname', 'like', '%' . $query . '%')
                       ->orWhere('midlename', 'like', '%' . $query . '%')
                       ->get();
     // Check if the search result is empty
     $isEmptyResult = $patients->isEmpty();

     // Return the filtered data to the "records" view along with the flag
     return view('records', compact('patients', 'isEmptyResult'));
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
        'contact' => 'required',
        'address' => 'required',
    ]);

    // Store the patient data
    $patient = Patient::create($validatedData);

    // Create an account for the patient
    $username = 'P' . str_pad($patient->id, 6, '0', STR_PAD_LEFT); // Assuming patient ID is numeric and less than 1,000,000
    $defaultPassword = 'password123'; // You can set any default password you prefer
    $hashedPassword = Hash::make($defaultPassword);

    // Save the patient account details
    $patient->account()->create([
        'username' => $username,
        'password' => $hashedPassword,
    ]);

    return redirect()->route('create')->with('success', 'Patient data and account created successfully!');
}

        public function edit($id)
        {
           
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

        return redirect()->route('create', ['id' => $id])->with('success', 'Patient data updated successfully!');
    }

    public function delete($id)
    {
       
        $patient = Patient::findOrFail($id);
        // dd($patient);
        return view('delete_patient', ['patient' => $patient]);
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
    
        // Delete the associated account if it exists
        if ($patient->account) {
            $patient->account->delete();
        }
    
        $patient->delete();
    
        return redirect()->route('create')->with('success', 'Patient and associated account deleted successfully!');
    }

    public function viewAccounts()
    {
        $patientsWithAccounts = Patient::with('account')->get();
        return view('accounts', ['patientsWithAccounts' => $patientsWithAccounts]);
    }


    public function showMaternalRecord($id)
    {
        $patient = Patient::findOrFail($id);
        return view('maternal', ['patient' => $patient]);
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
            ]);
    
            // Redirect back to the patient's maternal page after successful save
            return redirect()->route('maternal', ['id' => $patient->id])->with('success', 'Maternal record added successfully!');
        } catch (\Exception $e) {
            // If an error occurs, dump the error message for debugging
            dd($e->getMessage());
        }
    }

            public function editMaternalRecord($id)
        {
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
                return redirect()->route('maternal', ['id' => $patient->id])->with('success', 'Maternal record updated successfully!');
            } catch (\Exception $e) {
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
        
                    return redirect()->route('maternal', ['id' => $patientId])->with('success', 'Maternal record deleted successfully!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed to delete maternal record.');
                }
            }
        

            public function printMaternalRecord($id)
                {
                    // $patient = Patient::findOrFail($id);
                    $patient = Patient::with('maternalRecord')->findOrFail($id);

                    // Load the print-maternal.blade.php view with the patient data
                    return view('print-maternal', compact('patient'));
                }


                public function showChildForm($id)
                {
                    $patient = Patient::findOrFail($id);
                    return view('child', ['patient' => $patient]);
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
                            // Add other baby fields as needed
                        ]);
                    
                        // Load the patient with the baby relationship
               
                    
                        // Redirect back to the patient's child form after successful save
                        return redirect()->route('child', ['id' => $patient->id])->with('success', 'Baby information added successfully!');
                    }
                    



}







