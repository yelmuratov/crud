<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counts = $this->getCounts(); // Get global counts

        $universities = University::paginate(10);

        return view("University.index", array_merge([
            "universities" => $universities,
        ], $counts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("University.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        University::create($request->validated());
        return redirect()->route("universities.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        $counts = $this->getCounts($university); // Get counts for specific university

        return view('University.show', array_merge([
            'university' => $university,
            'counts' => $counts,
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        return view("University.edit", ["university" => $university]);
    }

    private function getCounts(University $university = null)
    {
        if ($university) {
            // Counts for a specific university
            $facultiesCount = DB::table('faculties')
                ->where('university_id', $university->id)
                ->count();

            $majorsCount = DB::table('majors')
                ->join('faculties', 'majors.faculty_id', '=', 'faculties.id')
                ->where('faculties.university_id', $university->id)
                ->count('majors.id');

            $groupsCount = DB::table('groups')
                ->join('majors', 'groups.major_id', '=', 'majors.id')
                ->join('faculties', 'majors.faculty_id', '=', 'faculties.id')
                ->where('faculties.university_id', $university->id)
                ->count('groups.id');

            $studentsCount = DB::table('students')
                ->join('groups', 'students.group_id', '=', 'groups.id')
                ->join('majors', 'groups.major_id', '=', 'majors.id')
                ->join('faculties', 'majors.faculty_id', '=', 'faculties.id')
                ->where('faculties.university_id', $university->id)
                ->count('students.id');

            return [
                'facultiesCount' => $facultiesCount,
                'majorsCount' => $majorsCount,
                'groupsCount' => $groupsCount,
                'studentsCount' => $studentsCount,
            ];
        } else {
            // Global counts
            $universityCount = University::count();
            $facultiesCount  = Faculty::count();
            $majorsCount     = Major::count();
            $groupsCount     = Group::count();
            $studentsCount   = Student::count();

            return [
                'universityCount' => $universityCount,
                'facultiesCount'  => $facultiesCount,
                'majorsCount'     => $majorsCount,
                'groupsCount'     => $groupsCount,
                'studentsCount'   => $studentsCount,
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->validated());
        return redirect()->route("universities.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->back();
    }
}
