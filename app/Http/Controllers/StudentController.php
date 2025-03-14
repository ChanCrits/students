<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Import the Student model

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function showRegistrationForm()
    {
        return view('students.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'age' => 'required|integer',
            'course' => 'required|string|max:255'
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->course = $request->course;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}