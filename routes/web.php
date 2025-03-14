<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\AuthController;

// Redirect the root URL to the Students page
Route::get('/', [StudentController::class, 'index']);

// Define route for Students page (if it's a separate page)
Route::get('/Students', [StudentController::class, 'index']);   

// Define resource route for Students
Route::resource('students', StudentController::class);

// Define routes for student registration
Route::get('students/register', [StudentController::class, 'showRegistrationForm'])->name('students.register.form');

// Define routes for user registration
Route::get('register', [UserRegisterController::class, 'showRegistrationForm'])->name('register.form')->middleware('guest');
Route::post('register', [UserRegisterController::class, 'register'])->name('register');

// Define routes for login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login');

// Define route for logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');