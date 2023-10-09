<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User; // Import the User model
use Illuminate\Support\Str;


class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('frontend/register'); // Assuming your view file is named 'register.blade.php'
    }

    public function register(Request $request)
    {
        // Validate user input
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Generate a 4-digit OTP
        $otp = str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);

        // Send the OTP to the user's email
        $details = [
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'title' => "Email Verification",
            'body' => 'Your verification code is: ' . $otp,
        ];

        Mail::to($request->input('email'))->queue(new VerificationMail($details, 'emails.verification', 'Email Verification'));

        // Save the OTP in the session for verification
        session(['otp' => $otp]);

        // Store user data in the session
        session([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // Redirect to a page where the user can enter the OTP (you can create this page)
        return view('frontend/verify');
    }

    public function showVerificationForm()
    {
        return view('frontend/verify');
    }

    public function verify(Request $request)
    {
        $otp = $request->input('otp'); // OTP entered by the user
    
        // Check if the entered OTP matches the one sent to the user's email
        if ($otp === session('otp')) {
            // OTP is correct, proceed with user registration
            $user = new User([
                'first_name' => session('first_name'),
                'last_name' => session('last_name'),
                'email' => session('email'),
                'password' => Hash::make(session('password')),
            ]);
    
            // Save user to the database
            $user->save();
    
            // Log in the user
            Auth::login($user);
    
            // Clear session data
            session()->forget(['otp', 'first_name', 'last_name', 'email', 'password']);
    
            // Redirect to the login page or any other desired page
            return redirect()->route('user.info')->with('success', 'You have successfully logged in.');
        } else {
            session()->flash('error', 'Invalid OTP. Please try again.');
            return view('frontend/verify');
        }
    }

 
 
 
    public function resendOTP()
{
    // Check if user information exists in the session
    if (!session()->has('first_name') || !session()->has('last_name') || !session()->has('email')) {
        // If user information is missing, redirect to registration
        return redirect()->route('register');
    }

    // Generate a new 4-digit OTP
    $otp = str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);

    // Send the new OTP to the user's email
    $user_info = [
        'first_name' => session('first_name'),
        'last_name' => session('last_name'),
        'email' => session('email'),
        'otp' => $otp,
    ];

    $details = [
        'name' => $user_info['first_name'] . ' ' . $user_info['last_name'],
        'title' => "Email Verification",
        'body' => 'Your new verification code is: ' . $otp,
    ];

    Mail::to($user_info['email'])->queue(new VerificationMail($details, 'emails.verification', 'Email Verification'));

    // Update the OTP in the session
    session()->put('otp', $otp);

    // Update the user information in the session
    session()->put('uinfo', $user_info);

    // Redirect back to the verification page
    return redirect()->route('verify')->with('success', 'OTP has been resent. Please check your email.');
}
}
