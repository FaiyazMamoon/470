<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function showSigninForm()
    {
        return view('signin');
    }

    public function signin(Request $request)
    {
        // Validate the sign-in data
        $validatedData = $request->validate([
            'username' => 'required', // Modify based on your actual form field name
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to sign in the user
        if (Auth::attempt([
            'name' => $validatedData['username'], // Modify based on your actual form field name
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])) {
            return redirect()->route('dashboard')->with('success', 'Sign-in successful!');
        } else {
            return redirect()->route('signin.form')->with('error', 'One or more credentials do not match.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('successOut', 'Logged out successfully.');
    }
    
}

