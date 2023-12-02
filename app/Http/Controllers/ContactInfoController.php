<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\ActivityLog;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactInfoController extends Controller
{
    public function create()
    {
        $contactInfos = ContactInfo::all();
       
           return view('contacts', ['contactInfos' => $contactInfos]);
    }

    public function display()
    {
        $contactInfos = ContactInfo::all();
        $teamMembers = TeamMember::all();
        
        return view('frontend.landing', compact('contactInfos', 'teamMembers'));
    }
    
    
    
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'location' => 'required',
        'email' => 'required|email',
        'facebook' => 'nullable',
        'phone' => 'required',
    ]);

    // Create and store a new contact information record
    $contactInfo = ContactInfo::create($validatedData);
    ActivityLog::create([
        'user_id' => Auth::id(), // Assuming you have user authentication
        'action' => 'Added Contacts Display', // Customize the action as needed
    ]);

    return redirect()->route('admin.contact-infos')
        ->with('success', 'Contact information has been added successfully.');
}
public function update(Request $request, $id)
{
    // Validate the input data
    $validatedData = $request->validate([
        'location' => 'required',
        'email' => 'required|email',
        'facebook' => 'nullable',
        'phone' => 'required',
    ]);

    // Find the contact information record by ID
    $contactInfo = ContactInfo::find($id);

    // Update the contact information with the validated data
    $contactInfo->update($validatedData);
    ActivityLog::create([
        'user_id' => Auth::id(), // Assuming you have user authentication
        'action' => 'Update Contact display ', // Customize the action as needed
    ]);

    // Redirect back or to a success page
    return redirect()->route('admin.contact-infos')->with('success', 'Contact information updated successfully');
}
public function destroy($id)
{
    // Find the contact information record by ID
    $contactInfo = ContactInfo::find($id);

    // Delete the contact information
    $contactInfo->delete();
    ActivityLog::create([
        'user_id' => Auth::id(), // Assuming you have user authentication
        'action' => 'Delete Contact display ', // Customize the action as needed
    ]);

    // Redirect back or to a success page
    return redirect()->route('admin.contact-infos')->with('success', 'Contact information deleted successfully');
}


}
