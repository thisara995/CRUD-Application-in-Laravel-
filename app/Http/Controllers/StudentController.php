<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    // Display a listing of the resource
    public function index(): View
    {
        // Fetch all students from the database
        $students = Student::paginate(5);
        
        // Return a view with the list of students
        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Show the form for creating a new resource
    public function create(): View
    {
        // Return a view for creating a new student
        return view('students.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'fullname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
        ]);

        // Create a new student
        Student::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('student.index')
                         ->with('success', 'Student added successfully.');
    }

    // Show the form for editing the specified resource
    public function edit(Student $student): View
    {
        // Return a view for editing the student
        return view('students.edit', compact('student'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Student $student): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'fullname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
        ]);

        // Update the student data
        $student->update($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('student.index')
                         ->with('success', 'Student data updated successfully.');
    }

    // Remove the Student data

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('student.index')
                        ->with('success','Student deleted successfully.');
    }

}
