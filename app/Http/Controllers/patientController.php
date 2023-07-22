<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patient;




class patientController extends Controller
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
    
}


    
    // public function maternal()
    // {
    //     // Your logic to retrieve maternal patient data
    //     $maternalPatients = Patient::where('category', 'maternal')->get();

    //     return view('maternal', compact('maternalPatients'));
    // }
    // public function maternal() {
    //     return view('maternal');
    // }

