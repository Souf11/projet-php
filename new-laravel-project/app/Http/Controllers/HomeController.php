<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure you have a User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // Handle Sign-Up
    public function signUp(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hash the password
        $user->save();

        return response()->json(['message' => 'Sign Up successful!'], 201);
    }

    // Handle Sign-In
    public function signIn(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Find the user by email
        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Store email in session
            Session::put('user_email', $user->email);

            return response()->json(['message' => 'Login successful!', 'redirect' => url('/home')]);
        } else {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }
    }

    // Show the home page (after login)
    public function home()
    {
        $email = Session::get('user_email');

        if ($email) {
            return view('homep', ['email' => $email]);
        } else {
            return redirect('/login');
        }
    }
}
