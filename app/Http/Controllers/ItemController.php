<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Item;
use App\Models\Package;
use App\Models\Patient;
use App\Models\BillItem;
use App\Models\ActivityLog;
use App\Models\BillPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function create()
    {
        $packages = Package::all();
        $items = Item::all(); // Fetch all items from the database
        return view('items', ['packages' => $packages, 'items' => $items]);
    }

    public function store(Request $request)
    {
        $item = new Item([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
        ]);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Store Item for Billables', // Corrected action text
        ]);

        $item->save();

        return redirect()->route('admin.items.create')->with('success', 'Item added successfully.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('edit-item', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->type = $request->input('type');
        // Update other fields as needed

        $item->save();

        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Update Billable Item', // Corrected action text
        ]);

        return redirect()->route('admin.items.create')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Delete Billable Item', // Corrected action text
        ]);

        return redirect()->route('admin.items.create')->with('success', 'Item deleted successfully.');
    }



    public function createPackage()
    {
        $items = Item::all();
        $packages = Package::with('items')->get();

        return view('create-package', compact('items', 'packages'));
    }

    public function storePackage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required', // Add validation for the description
            'items' => 'required|array', // Validate that at least one item is selected
        ]);
    
        $package = Package::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'], // Save the description
        ]);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Added a Package Item', // Corrected action text
        ]);
    
        $package->items()->attach($validatedData['items']);
    
        return redirect()->route('admin.packages.create')->with('success', 'Package added successfully.');
    }
    

    public function updatePackage(Request $request, Package $package)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'items' => 'required|array',
        ]);

        $package->update(['name' => $validatedData['name']]);
        $package->items()->sync($validatedData['items']);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Update Package ', // Corrected action text
        ]);

        return redirect()->route('admin.packages.create')->with('success', 'Package updated successfully.');
    }

    public function destroyPackage(Package $package)
    {
        $package->delete();
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Delete Package', // Corrected action text
        ]);

        return redirect()->route('admin.packages.create')->with('success', 'Package deleted successfully.');
    }


    public function selectPatient()
    {
        $patients = Patient::where('status', true)->get();
        return view('select_patient', compact('patients'));
    }


    public function checkout($patientId)
    {
        $decryptedId = decrypt($patientId);
        // Retrieve the patient by ID
        $patient = Patient::findOrFail($decryptedId);

        // Find the patient's bill
        $bill = Bill::where('patient_id', $decryptedId)
            ->where('status', true)
            ->first();
            
        // Initialize arrays to store selected item and package IDs
        $selectedItemIds = [];
        $selectedPackageIds = [];

        // Initialize an array to store selected item quantities
        $selectedItemQuantities = [];

        // Check if a bill exists for the patient
        if ($bill) {
            // Retrieve selected item IDs from the bill if bill items exist
            if ($bill->billItems) {
                $selectedItemIds = $bill->billItems->pluck('item_id')->toArray();

                // Populate selected item quantities
                foreach ($bill->billItems as $billItem) {
                    $selectedItemQuantities[$billItem->item_id] = $billItem->quantity;
                }
            }

            // Retrieve selected package IDs from the bill if bill packages exist (if applicable)
            if ($bill->billPackages) {
                $selectedPackageIds = $bill->billPackages->pluck('packages_id')->toArray();
            }
        }

        // Retrieve all items and packages
        $items = Item::all();
        $packages = Package::all();

        // Pass the selectedItemQuantities to the Blade view
        return view('checkout', compact('patient', 'items', 'packages', 'selectedItemIds', 'selectedPackageIds', 'selectedItemQuantities'));
    }



    public function bill(Request $request, $patientId)
    {
        $patientId = decrypt($patientId);
        $bill = Bill::where('patient_id', $patientId)
            ->where('status', true)
            ->first();

        $selectedItemIds = $request->input('items', []);
        $selectedPackageIds = $request->input('packages', []);

        $selectedItems = Item::whereIn('id', $selectedItemIds)->get();
        $selectedPackages = Package::whereIn('id', $selectedPackageIds)->with('items')->get();
        $patient = Patient::findOrFail($patientId);

        $itemQuantities = [];
        foreach ($selectedItems as $item) {
            $itemQuantities[$item->id] = $request->input('item_quantity.' . $item->id, 1);
        }

        $totalAmount = 0;
        foreach ($selectedItems as $item) {
            $totalAmount += $item->price * $itemQuantities[$item->id];
        }

        // Calculate total amount for selected packages
        foreach ($selectedPackages as $package) {
            foreach ($package->items as $item) {
                $totalAmount += $item->price; // Add package item prices to total
            }
        }

        $totalDiscount = 0;

        // Calculate total discount for service items
        if ($patient->philhealth_beneficiary) {
            foreach ($selectedItems as $item) {
                if ($item->type === 'service') {
                    $quantity = isset($itemQuantities[$item->id]) ? $itemQuantities[$item->id] : 1;
                    $totalDiscount += $item->price * $quantity;
                }
            }
            foreach ($selectedPackages as $package) {
                foreach ($package->items as $item) {
                    if ($item->type === 'service') {
                        $quantity = isset($itemQuantities[$item->id]) ? $itemQuantities[$item->id] : 1;
                        $totalDiscount += $item->price * $quantity;
                    }
                }
            }
        }

        $totalAmount = $totalAmount - $totalDiscount;
        $subtotal = $totalAmount;
        $totalAmount = $subtotal + $totalDiscount;

        $processedData = [
            'selectedItems' => $selectedItems,
            'selectedPackages' => $selectedPackages,
            'itemQuantities' => $itemQuantities,
            'totalAmount' => $totalAmount,
            'subtotal' => $subtotal,
            'totalDiscount' => $totalDiscount,
        ];

        $subtotal = $totalAmount - $totalDiscount;

        // // Update the session variable with the currently selected item IDs
        // session(['selectedItemIds' => $selectedItemIds]);
        // session(['selectedPackageIds' => $selectedPackageIds]);
        // session(['selectedItemQuantities' => $itemQuantities]);

        // Check if a bill already exists for the patient
        if ($bill) {
            // Update the existing bill
            $bill->total_amount = $totalAmount;
            $bill->subtotal = $subtotal;
            $bill->total_discount = $totalDiscount;
            $bill->save();

            // Remove any BillItem records that are not in the selected list
            BillItem::where('bill_id', $bill->id)
                ->whereNotIn('item_id', $selectedItemIds)
                ->delete();

            // Remove any BillPackage records that are not in the selected list
            BillPackage::where('bill_id', $bill->id)
                ->whereNotIn('packages_id', $selectedPackageIds)
                ->delete();
                
                ActivityLog::create([
                    'user_id' => Auth::id(), // Assuming you have user authentication
                    'action' => 'Modify Current Bill For', // Corrected action text
                    'patient_id' => $patientId, // Use the correct variable $patientId
                ]);
        } else {
            // Create a new Bill instance if no bill exists and set the status to true
            $bill = new Bill();
            $bill->patient_id = $patientId;
            $bill->total_amount = $totalAmount;
            $bill->subtotal = $subtotal;
            $bill->total_discount = $totalDiscount;
            $bill->status = true; // Set status to true
            $bill->save();

            ActivityLog::create([
                'user_id' => Auth::id(), // Assuming you have user authentication
                'action' => 'Generate Bill For', // Corrected action text
                'patient_id' => $patientId, // Use the correct variable $patientId
            ]);
        }


        // Initialize arrays to store selected item and package IDs
        $selectedItemIds = [];
        $selectedPackageIds = [];

        // Loop through selected items and packages to create or update BillItems and BillPackages
        foreach ($selectedItems as $item) {
            // Check if this item already exists in the bill
            $existingBillItem = BillItem::where('bill_id', $bill->id)
                ->where('item_id', $item->id)
                ->first();

            if ($existingBillItem) {
                // Item already exists, update quantity or any other relevant information
                $existingBillItem->quantity = $itemQuantities[$item->id];
                $existingBillItem->save();
            } else {
                // Create a new BillItem
                $billItem = new BillItem();
                $billItem->bill_id = $bill->id;
                $billItem->item_id = $item->id;
                $billItem->quantity = $itemQuantities[$item->id];
                $billItem->price = $item->price;
                $billItem->save();
            }

            $selectedItemIds[] = $item->id; // Add item ID to the selectedItemIds array
        }

        foreach ($selectedPackages as $package) {
            // Check if this package already exists in the bill
            $existingBillPackage = BillPackage::where('bill_id', $bill->id)
                ->where('packages_id', $package->id)
                ->first();

            if (!$existingBillPackage) {
                // Create a new BillPackage
                $billPackage = new BillPackage();
                $billPackage->bill_id = $bill->id;
                $billPackage->packages_id = $package->id;
                $billPackage->save();
            }

            $selectedPackageIds[] = $package->id; // Add package ID to the selectedPackageIds array
        }

        // Pass the processed data to the view
        $processedData['billId'] = $bill->id; // Pass the bill ID for reference

        return view('bill-preview', compact('patient', 'processedData'));
    }

    public function BillPreview($patientId)
    {
        $patientId = decrypt($patientId);
        // Retrieve the patient by ID
        $patient = Patient::findOrFail($patientId);

        // Retrieve the latest bill for the patient (assuming you have a Bill model)
        $bill = Bill::where('patient_id', $patientId)
            ->latest() // Retrieve the latest bill
            ->first();

        // Render the printable view with the patient and bill data
        return view('discharge-bill', compact('patient', 'bill'));
    }


    
    public function printBillPreview($patientId)
    {
        $patientId = decrypt($patientId);
        // Retrieve the patient by ID
        $patient = Patient::findOrFail($patientId);

        // Retrieve the latest bill for the patient (assuming you have a Bill model)
        $bill = Bill::where('patient_id', $patientId)
            ->latest() // Retrieve the latest bill
            ->first();

        // Render the printable view with the patient and bill data
        return view('print-receipt', compact('patient', 'bill'));
    }

}
