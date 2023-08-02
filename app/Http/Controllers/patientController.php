<?php


namespace App\Http\Controllers;
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

    // public function show($id)
    // {
    //     $patient = Patient::findOrFail($id);

    //     return view('maternal', compact('patient'));
    // }

    
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


   
}







