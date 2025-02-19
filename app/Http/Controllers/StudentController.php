<?php

namespace App\Http\Controllers;

use App\Models\Student;

// kani dre
use Illuminate\Http\Request;
    
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();  // Fetch all students from the database ug ang bag o nga user is mapunta sa taas
        return view('students.index', compact('students'));  // Pass data to the view
    }


//kani dre 
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer',
            'course' => 'required|string|max:255',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }
}

