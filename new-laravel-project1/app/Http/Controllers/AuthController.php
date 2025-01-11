<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Professeur Sign-Up
    public function signUpProfesseur(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create the Professeur user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('professeur.login')->with('success', 'Sign-up successful!');
    }

    // Professeur Login
    public function signInProfesseur(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('professeur.dashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    // Professeur Dashboard
    public function professeurDashboard()
    {
        return view('professeur.dashboard');
    }
}
