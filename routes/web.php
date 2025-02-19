<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Redirect the root URL to the Students page
Route::get('/', [StudentController::class, 'index']);

// Define route for Students page (if it's a separate page)
Route::get('/Students', [StudentController::class, 'index']);   


// Define route for Add Student page
Route::resource('students', StudentController::class);



