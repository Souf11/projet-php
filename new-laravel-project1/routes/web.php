<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; // Import AdminController

// Default route: Redirects to the role selection page
Route::get('/', function () {
    return redirect()->route('choose-role'); // Redirect to choose-role page
});

// Show the role selection page (Professeur or Administrateur)
Route::get('/choose-role', function () {
    return view('auth.choose-role'); // This view will allow users to choose their role
})->name('choose-role');

// Show the login page for Professeur
Route::get('/login', function () {
    $role = request('role'); // Capture the role from the query parameter
    if (!$role) {
        return redirect()->route('choose-role'); // If no role selected, redirect to the role selection page
    }

    // Redirect to appropriate login pages based on the role
    if ($role === 'administrateur') {
        return redirect()->route('login.administrateur');
    }

    return view('auth.login', compact('role')); // Default: Pass the role to the login page view
})->name('login');

// Show the login page for Administrateur
Route::get('/login-administrateur', function () {
    return view('auth.login-administrateur'); // Separate view for Administrateur login
})->name('login.administrateur');

// Handle Sign-Up (POST request)
Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');

// Handle Sign-In for Professeur (POST request)
Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');

// Handle Sign-In for Administrateur (POST request)
Route::post('/admin-sign-in', [AdminController::class, 'signIn'])->name('admin.sign-in');

// Redirect to Home after successful login (Authenticated user)
Route::get('/home', [AuthController::class, 'home'])->name('home')->middleware('auth'); // Protect with 'auth' middleware

// Redirect to a specific home page after login based on role (this can be any page you want)
Route::get('/homep', function () {
    return view('homep'); // This view will be shown once the user logs in
})->name('homep')->middleware('auth'); // Protect with 'auth' middleware

// Routes for Professeur Dashboard
Route::get('/professeur/dashboard', function () {
    return view('professeur.dashboard'); // Professeur dashboard view
})->name('professeur.dashboard')->middleware('auth');

// Routes for Administrateur Dashboard
Route::get('/administrateur/dashboard', function () {
    return view('administrateur.dashboard'); // Administrateur dashboard view
})->name('admin.dashboard')->middleware('auth');
