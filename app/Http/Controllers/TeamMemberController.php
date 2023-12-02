<?php

namespace App\Http\Controllers;
use App\Models\TeamMember;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Facades\Validator; // Import the Validator facade


class TeamMemberController extends Controller
{
    public function create()
    {
        $teamMembers = TeamMember::all(); // Retrieve all team members
    
        return view('staff', ['teamMembers' => $teamMembers]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'degrees' => 'required|string',
            'position' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size: 2MB
        ]);
    
        $imagePath = $request->file('image')->store('team-member-images', 'public');
        $imagePath = 'storage/' . $imagePath;
    
        TeamMember::create([
            'name' => $request->name,
            'degrees' => $request->degrees,
            'position' => $request->position,
            'image_url' => $imagePath,
        ]);
        ActivityLog::create([
            'user_id' => Auth::id(), // Assuming you have user authentication
            'action' => 'Added a Staff display ', // Customize the action as needed
        ]);
    
        return redirect()->back()->with('success', 'Team member added successfully');
    }
    public function edit($id)
{
    
    $member = TeamMember::find(decrypt($id));
    return view('edit-staff', ['member' => $member]);
}
public function update(Request $request, $id)
{
    $member = TeamMember::find(decrypt($id));

    $request->validate([
        'name' => 'required|string',
        'degrees' => 'required|string',
        'position' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image if provided
    ]);

    $member->name = $request->input('name');
    $member->degrees = $request->input('degrees');
    $member->position = $request->input('position');

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('team-member-images', 'public');
        $imagePath = 'storage/' . $imagePath; // Adjust the path as needed
        $member->image_url = $imagePath;
    }

    $member->save();
    ActivityLog::create([
        'user_id' => Auth::id(), // Assuming you have user authentication
        'action' => 'Update a Staff display ', // Customize the action as needed
    ]);

  

    return redirect()->route('admin.team-members')->with('success', 'Team member updated successfully');
}
public function destroy($id)
{
    $member = TeamMember::find(decrypt($id));
    $member->delete();
    ActivityLog::create([
        'user_id' => Auth::id(), // Assuming you have user authentication
        'action' => 'Delete a Staff display ', // Customize the action as needed
    ]);

    return redirect()->route('admin.team-members')->with('success', 'Team member deleted successfully');
}


}