<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Group;
use App\Models\Student;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        $universityCount = University::count();
        $facilitiesCount = Faculty::count();
        $majorsCount = Major::count();
        $groupsCount = Group::count();
        $studentCount = Student::count();
        $universities = University::paginate(10);
        return view("University.index", [
            "universities" => $universities,
            "universityCount" => $universityCount,
            "facilitiesCount" => $facilitiesCount,
            "majorsCount" => $majorsCount,
            "groupsCount" => $groupsCount,
            "studentCount" => $studentCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityRequest $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        //
    }
}
