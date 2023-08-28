<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users'), // Make sure email is unique
            ],
            'password' => 'required|min:8|confirmed', // Password should match with password_confirmation
        ], [
            'email.unique' => 'Email already exists.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password should be at least 8 characters long.',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash the password
        ]);

        // You can log the user in here if needed

        return redirect()->route('home')->with('successUp', 'Registration successful!'); // Redirect with success message
    }
}
