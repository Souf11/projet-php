<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Change to the correct controller

// Default route (Laravel's welcome page)
Route::get('/', function () {
    return view('auth.login');  // This will be your login view (login.blade.php)
})->name('login');

// Show the login page
Route::get('/login', function () {
    return view('auth.login');  // This is your login view (login.blade.php)
})->name('login');

// Handle Sign-Up (POST)
Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');

// Handle Sign-In (POST)
Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');

// Redirect to Home after successful login
Route::get('/home', [AuthController::class, 'home'])->name('home');


// Show the login page
Route::get('/homep', function () {
    return view('homep');  // This is your login view (login.blade.php)
})->name('homep');