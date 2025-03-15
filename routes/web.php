<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\PreventBackHistory;

// Redirect the root URL to the Students page
Route::get('/', function () {
    return redirect()->route('students.index');
});

// Routes that require authentication and prevent back history
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::resource('students', StudentController::class);

    // Logout route
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Define routes for user registration
Route::middleware(['guest', PreventBackHistory::class])->group(function () {
    Route::get('register', [UserRegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('register', [UserRegisterController::class, 'register'])->name('register');

    // Login routes
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});
