<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer',
            'course' => 'required|string|max:255',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'age' => 'required|integer',
    //         'course' => 'required|string|max:255',
    //     ]);

    //     $student = Student::findOrFail($id);
    //     $student->update($request->all());

    //     return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    // }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}