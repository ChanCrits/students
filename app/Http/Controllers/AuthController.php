<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $student = Student::where('email', $request->email)->first();

        if ($student && \Hash::check($request->password, $student->password)) {
            session(['student_id' => $student->id]);
            return redirect()->route('students.index');
        }

        return back()->with('error', 'Invalid email or password.');
    }
}