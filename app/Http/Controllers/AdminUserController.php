<?php

namespace App\Http\Controllers;

use App\Models\AdminUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\TemporaryPasswordEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    public function index()
    {
        $adminUsers = AdminUsers::all();
      
        return view('admin_users', ['adminUsers' => $adminUsers]);
    }
    public function create()
{
    return view('users_create');
}

public function storeUser(Request $request)
{
    // Validate the request
    $request->validate([
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'email' => 'required|email|unique:admin_users',
        'user_level' => 'required',
    ]);

    // Generate a temporary password
    $temporaryPassword = Str::random(10); // Adjust the length as needed

    // Create the user with the temporary password
    $user = AdminUsers::create([
        'first_name' => $request->input('first_name'),
        'middle_name' => $request->input('middle_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'user_level' => $request->input('user_level'),
        'password' => Hash::make($temporaryPassword),
    ]);

    // Send the temporary password to the user
    Mail::to($user->email)->send(new TemporaryPasswordEmail($temporaryPassword));

    // Redirect or perform additional actions as needed
    return redirect()->route('admin.Users')->with('success', 'User created successfully.');
}
public function resetPassword(Request $request, $userId)
{
    // Validate request and find the user
    $request->validate([
        // Add any validation rules if needed
    ]);

    $user = AdminUsers::find($userId);

    if (!$user) {
        // Handle user not found, e.g., return an error response
        return response()->json(['error' => 'User not found'], 404);
    }

    // Generate a new password
    $newPassword = Str::random(10);

    // Update the user's password
    $user->update([
        'password' => Hash::make($newPassword),
    ]);

    // Send the new password to the user's email
    Mail::to($user->email)->send(new TemporaryPasswordEmail($newPassword));

    // Return a success response
    return back()->with('success', 'Password reset successfully');
}


}
