<?php

namespace App\Http\Controllers;

use App\Models\AdminUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\TemporaryPasswordEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

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


public function previewUser($id)
{
    // Decrypt the ID before using it to find the user
    $decryptedId = Crypt::decrypt($id);

    // Use the decrypted ID to find the user
    $user = AdminUsers::findOrFail($decryptedId);

    return view('users_edit', compact('user'));
}
public function updateUser(Request $request, $id)
{
    $decryptedId = Crypt::decrypt($id);
    $user = AdminUsers::findOrFail($decryptedId);
    $user->update($request->all());

    return redirect()->route('admin.Users')->with('success', 'User updated successfully');
}

public function deleteUser($id)
{
    $decryptedId = Crypt::decrypt($id);
    $adminUser = AdminUsers::findOrFail($decryptedId);

    // Check if the user has 'ADMIN' user level
    if ($adminUser->user_level === 'ADMIN') {
        // Check if they are the last 'ADMIN' user
        $otherAdminsCount = AdminUsers::where('user_level', 'ADMIN')->where('id', '!=', $adminUser->id)->count();

        if ($otherAdminsCount === 0) {
            // Store the error message in the session
            return redirect()->route('admin.Users')->with('error', 'Cannot delete the last admin user.');
        }
    }

    $adminUser->delete();

    return redirect()->route('admin.Users')->with('success', 'Admin user deleted successfully');
}


public function showForgotPasswordForm()
{
    return view('forgot-password');
}

public function sendPasswordResetLink(Request $request)
{
    // Validate that the user is authenticated and is an admin
    if (!Auth::check() || Auth::user()->user_level !== 'ADMIN') {
        return back()->with('error', 'You do not have permission to perform this action.');
    }

    $request->validate([
        'email' => 'required|email|exists:admin_users,email',
    ]);

    $user = AdminUsers::where('email', $request->email)->first();

    // Generate a new temporary password
    $temporaryPassword = Str::random(10);

    // Update the user's password
    $user->update([
        'password' => Hash::make($temporaryPassword),
    ]);

    // Send the new password to the user's email
    Mail::to($user->email)->send(new TemporaryPasswordEmail($temporaryPassword));

    return back()->with('success', 'Temporary password sent successfully. Check your email.');
}
}
