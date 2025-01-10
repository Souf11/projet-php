<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Sign-Up method
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create user with role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set a default role for the user
        ]);

        return redirect()->route('login')->with('success', 'Sign-up successful!');
    }

    // Sign-In method
    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect based on the user's role
            if (Auth::user()->role === 'administrateur') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'professeur') {
                return redirect()->route('professeur.dashboard');
            } else {
                return redirect()->route('home'); // Default fallback
            }
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    // Home method (after login)
    public function home()
    {
        return view('home');
    }
}
