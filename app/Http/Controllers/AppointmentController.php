<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AppointmentPatient;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\Step2ValidationRequest;
use App\Models\DateTimeReasons;

class AppointmentController extends Controller
{
    public function showLoginApp()
    {
        
        return view('frontend/appointment-login');

    }
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();


        // Check if the user with this email already exists
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // If the user exists, log them in
            Auth::login($existingUser);
        } else {
            // If the user doesn't exist, create a new user account
            $newUser = new User();
            $newUser->email = $user->email;
            $newUser->password = ''; // You can set a default password or generate one

            // Split the full name into first name, middle name, and last name
            $nameParts = explode(' ', $user->name);

            // Assign the name parts to user fields
            $newUser->first_name = isset($nameParts[0]) ? $nameParts[0] : '';
            $newUser->last_name = isset($nameParts[1]) ? $nameParts[1] : '';
            $newUser->middle_name = isset($nameParts[2]) ? $nameParts[2] : '';


            $newUser->save();

            // Log in the new user
            Auth::login($newUser);
        }


        // Redirect the user to the desired page after login
        return redirect()->route('appointment.user.info')->with('success', 'You have successfully logged in.');
    }
    // In your controller
    // In your controller
    public function showUserinfo()
    {
        $user = Auth::user(); // Retrieve the currently logged-in user
    
        // Split the user's name into parts
        $nameParts = explode(' ', $user->name);
    
        // Retrieve the existing AppointmentPatient record for the user, if it exists
        $appointmentPatient = AppointmentPatient::where('user_id', $user->id)->first();
    
        // Check if the user has associated dateTimeReasons
        $DateTimeReasons = $appointmentPatient ? $appointmentPatient->dateTimeReasons()->exists() : false;
        if ($DateTimeReasons) {
            // Load a different view for users with dateTimeReasons
            return redirect()->route('appointment.combined.info', [
                'user' => $user,
                'firstName' => isset($nameParts[0]) ? $nameParts[0] : '',
                'lastName' => isset($nameParts[1]) ? $nameParts[1] : '',
                'middleName' => isset($nameParts[2]) ? $nameParts[2] : '',
                'appointmentPatient' => $appointmentPatient,
            ]);
        } else {
            // Load the default user-info view
            return view('frontend/user-info', [
                'user' => $user,
                'firstName' => isset($nameParts[0]) ? $nameParts[0] : '',
                'lastName' => isset($nameParts[1]) ? $nameParts[1] : '',
                'middleName' => isset($nameParts[2]) ? $nameParts[2] : '',
                'appointmentPatient' => $appointmentPatient,
            ]);
        }
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Use the "web" guard explicitly
        if (Auth::guard('web')->attempt($credentials)) {
            // Authentication passed, user is logged in
            return redirect()->route('appointment.user.info')->with('success', 'You have successfully logged in.');
        }
    
        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    




    public function store(Request $request)
    {
        // Find the authenticated user (you can change this depending on your authentication logic)
        $user = auth()->user();

        // Create a new instance of AppointmentPatient and associate it with the user
        $appointmentPatient = new AppointmentPatient();
        $appointmentPatient->user_id = $user->id;

        // Populate the fields with data from the request
        $appointmentPatient->first_name = $request->input('first_name');
        $appointmentPatient->last_name = $request->input('last_name');
        $appointmentPatient->middle_name = $request->input('middle_name');
        $appointmentPatient->birthday = $request->input('birthday');
        $appointmentPatient->age = $request->input('age');
        $appointmentPatient->civil_status = $request->input('civil_status');
        $appointmentPatient->contact = $request->input('contact');
        $appointmentPatient->address = $request->input('address');
        $appointmentPatient->philhealth_beneficiary = $request->has('philhealth_beneficiary');

        // Save the appointment_patient record
        $appointmentPatient->save();

        // Optionally, you can redirect or return a response indicating success
        return redirect()->route('appointment.step2')->with('success', 'Patient record created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Find the authenticated user (you can change this depending on your authentication logic)
        $user = auth()->user();

        // Find the AppointmentPatient record by its ID
        $appointmentPatient = AppointmentPatient::findOrFail($id);

        // Check if the user is authorized to update this record (you can add authorization logic here)

        // Update the fields with data from the request
        $appointmentPatient->first_name = $request->input('first_name');
        $appointmentPatient->last_name = $request->input('last_name');
        $appointmentPatient->middle_name = $request->input('middle_name');
        $appointmentPatient->birthday = $request->input('birthday');
        $appointmentPatient->age = $request->input('age');
        $appointmentPatient->civil_status = $request->input('civil_status');
        $appointmentPatient->contact = $request->input('contact');
        $appointmentPatient->address = $request->input('address');
        $appointmentPatient->philhealth_beneficiary = $request->has('philhealth_beneficiary');

        // Save the updated appointment_patient record
        $appointmentPatient->save();

        // Optionally, you can redirect or return a response indicating success
        return redirect()->route('appointment.step2')->with('success', 'Patient record updated successfully.');
    }
    public function step2()
    {
        $user = Auth::user(); // Retrieve the currently logged-in user

        // Retrieve the existing AppointmentPatient record for the user, if it exists
        $appointmentPatient = AppointmentPatient::where('user_id', $user->id)->first();

        return view('frontend/step2', compact('appointmentPatient'));
    }
    public function storeStep2(Request $request)
    {
        // Find the authenticated user (you can change this depending on your authentication logic)
        $user = auth()->user();

        // Retrieve the associated AppointmentPatient record
        $appointmentPatient = AppointmentPatient::where('user_id', $user->id)->first();

        if (!$appointmentPatient) {
            // Handle the case where the appointment patient doesn't exist.
            return redirect()->back()->with('error', 'Appointment patient not found.');
        }

        // Create or update the DateTimeReason record
        DateTimeReasons::updateOrCreate(
            ['appointment_patient_id' => $appointmentPatient->id],
            [
                'appointment_date' => $request->input('appointment_date'),
                'appointment_time' => $request->input('appointment_time'),
                'reason' => $request->input('appointment_reason'),
            ]
        );

        // Redirect to a success page or any other appropriate page
        return redirect()->route('appointment.combined.info')->with('success', 'Appointment information saved successfully.');
    }
    public function combinedInfo()
    {
        $user = Auth::user();
        $appointmentPatient = AppointmentPatient::where('user_id', $user->id)->first();

        if (!$appointmentPatient) {
            // Handle the case where the appointment patient doesn't exist.
            return redirect()->back()->with('error', 'Appointment patient not found.');
        }

        // Retrieve the associated DateTimeReason, if it exists
        $dateTimeReason = $appointmentPatient->dateTimeReasons()->first();
          
        // dd(  $dateTimeReason);
        return view('frontend/success', [
            'appointmentPatient' => $appointmentPatient,
            'dateTimeReason' => $dateTimeReason,
        ]);
    }

    public function getAppointmentInfo($id)
    {
        // Retrieve the appointment information based on the provided ID
        $appointment = AppointmentPatient::find($id);
    
        // Check if the appointment exists
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    
        // Load a view to display the appointment details
        return view('appointment-info', compact('appointment'));
    }
    public function destroyAppointment($id)
    {
        // Find the appointment by ID
        $appointment = AppointmentPatient::find($id);
    
        // Check if the appointment exists
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    
        // Delete the appointment
        $appointment->delete();
    
        // Redirect to a suitable page, such as the appointments listing
        return redirect()->route('admin.index')->with('success', 'Appointment deleted successfully.');
    }
    

    
}
