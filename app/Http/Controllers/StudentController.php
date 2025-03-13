<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterStudent; // Import the RegisterStudent model
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Other methods...

    public function index()
    {
        // You can customize this method to return a view or data as needed
        return view('students.index'); // Ensure you have a view named 'index.blade.php' in the 'students' directory
    }

    public function showRegistrationForm()
    {
        return view('students.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:register_students',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $registerStudent = new RegisterStudent();
        $registerStudent->email = $request->email;
        $registerStudent->password = Hash::make($request->password);
        $registerStudent->save();

        return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }
}