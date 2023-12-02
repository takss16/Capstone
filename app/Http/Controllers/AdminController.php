<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->route('admin.index'); // Replace with your desired admin dashboard route
        }
        
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
