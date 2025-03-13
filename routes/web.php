<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

// Redirect the root URL to the Students page
Route::get('/', [StudentController::class, 'index']);

// Define route for Students page (if it's a separate page)
Route::get('/Students', [StudentController::class, 'index']);   

// Define resource route for Students
Route::resource('students', StudentController::class);

// Define routes for registration
Route::get('register', [StudentController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [StudentController::class, 'register'])->name('students.register');

// Define routes for login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');