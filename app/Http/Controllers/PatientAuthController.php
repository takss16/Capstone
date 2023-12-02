<?php

namespace App\Http\Controllers;

use App\Models\CheckUp;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PatientAuthController extends Controller
{
    public function showLoginForm()
    {
        
        return view('frontend/patient-login'); // Create a patient login form view
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        if (Auth::guard('account')->attempt($credentials)) {
            // Authentication succeeded
            $authenticatedAccount = Auth::guard('account')->user();
            $patient = $authenticatedAccount->patient;
    
            if ($patient) {
                // Retrieve the latest check-up for the patient
                $latestCheckUp = $patient->checkups()->latest('visit_date')->first();
    
                return view('frontend/patient-dashboard', compact('patient', 'latestCheckUp'));
            } else {
                // Handle the case where no patient is associated with the account
                return back()->withErrors(['username' => 'Invalid credentials']);
            }
        } else {
            // Authentication failed
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }
    
        public function dashboard()
    {
        // Retrieve the authenticated account and associated patient
        $authenticatedAccount = Auth::guard('account')->user();
        $patient = $authenticatedAccount->patient;
    
        if ($patient) {
            // Retrieve the patient's latest checkup along with associated medicines
            $latestCheckUp = $patient->checkups()->latest('visit_date')->with('medicineRecords')->first();
   
            return view('frontend.patient-dashboard', compact('patient', 'latestCheckUp'));
        } else {
            // Handle the case where no patient is associated with the account
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function viewMedicine()
    {
        // Retrieve the authenticated account and associated patient
        $authenticatedAccount = Auth::guard('account')->user();
        $patient = $authenticatedAccount->patient;
    
        if ($patient) {
            // Retrieve the patient's latest checkup along with associated medicines
            $latestCheckUp = $patient->checkups()->latest('visit_date')->with('medicineRecords')->first();
   
            return view('frontend.view-med', compact('patient', 'latestCheckUp'));
        } else {
            // Handle the case where no patient is associated with the account
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function Reminders()
    {
        // Retrieve the authenticated account and associated patient
        $authenticatedAccount = Auth::guard('account')->user();
        $patient = $authenticatedAccount->patient;
    
        if ($patient) {
            // Retrieve the patient's latest checkup along with associated medicines
            $latestCheckUp = $patient->checkups()->latest('visit_date')->with('medicineRecords')->first();
   
            return view('frontend.patient-reminders', compact('patient', 'latestCheckUp'));
        } else {
            // Handle the case where no patient is associated with the account
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function showChangePasswordForm()
    {
        return view('frontend.change-password');
    }
    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);
    
        // Get the currently authenticated account
        $authenticatedAccount = Auth::guard('account')->user();
    
        // Check if the current password is correct
        if (Hash::check($request->current_password, $authenticatedAccount->password)) {
            // Set the new password
            $authenticatedAccount->password = Hash::make($request->new_password);
    
            // Save the changes to the account
            $authenticatedAccount->save();
    
            return redirect()->route('account.patient.dashboard')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('account.changePasswordForm')->with('error', 'Current password is incorrect.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect()->route('account.login'); // Redirect to the login page
    }

    
}
