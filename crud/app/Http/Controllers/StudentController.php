<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Group;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Student.index', [
            'students' => Student::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $universities = University::all();
        $faculties = Faculty::all();
        $majors = Major::all();
        $groups = Group::all();
        return view('Student.create',['universities' => $universities, 'faculties' => $faculties, 'majors' => $majors, 'groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $group = Group::find($student->group_id);
        $major = Major::find($group->major_id);
        $faculty = Faculty::find($major->faculty_id);
        $university = University::find($faculty->university_id);

        return view('Student.show', [
            'student' => $student,
            'group' => $group,
            'major' => $major,
            'faculty' => $faculty,
            'university' => $university
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $universities = University::all();
        $faculties = Faculty::all();
        $majors = Major::all();
        $groups = Group::all();
        return view('Student.edit', [
            'student' => $student,
            'universities' => $universities,
            'faculties' => $faculties,
            'majors' => $majors,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
