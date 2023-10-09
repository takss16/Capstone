<?php

namespace App\Http\Controllers;

use App\Models\Dosage;
use App\Models\Frequency;
use App\Models\MedicineName;
use Illuminate\Http\Request;

class MedicineNameController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'newMedicineName' => 'required|unique:medicine_names,name',
        ]);

        MedicineName::create([
            'name' => $request->input('newMedicineName'),
        ]);

        return redirect()->back()->with('success', 'Medicine name added successfully.');
    }

    public function destroy($id)
    {
        MedicineName::destroy($id);

        return redirect()->back()->with('success', 'Medicine name deleted successfully.');
    }

    public function storeFrequency(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:frequencies',
        ]);

        Frequency::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->back()->with('success', 'Frequency added successfully.');
    }

    public function destroyFrequency($id)
    {
        Frequency::destroy($id);

        return redirect()->back()->with('success', 'Frequency deleted successfully.');
    }
    public function storeDosage(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:dosages',
        ]);

        Dosage::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->back()->with('success', 'Dosage added successfully.');
    }

    public function destroyDosage(Dosage $dosage)
    {
        $dosage->delete();

        return redirect()->back()->with('success', 'Dosage deleted successfully.');
    }
}
