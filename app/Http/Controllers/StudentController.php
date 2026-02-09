<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::with('course');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%$search%")
                    ->orWhere('lastname', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }



        $students = $query->paginate(10)->withQueryString(); // keep search and filters on pagination
        $courses = Course::all();

        return view('Students.index', compact('students', 'courses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('Students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->getInsertTableField());

        return redirect()->route('students.index')->with('success', 'student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('course');


        return view('Students.view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('Students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $request->getInsertTableField();

        if ($request->hasFile('avatar')) {
            if ($student->avatar && file_exists(public_path('storage/' . $student->avatar))) {
                unlink(public_path('storage/' . $student->avatar));
            }
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::find($student->id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
