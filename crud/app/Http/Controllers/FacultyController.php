<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;
use App\Models\University;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::paginate(10);
        $counts = $this->getCounts();
        return view('Faculty.index', compact('faculties', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = University::all();
        return view('Faculty.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        Faculty::create($request->validated());
        return redirect()->route('faculties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {   
        $university = University::find($faculty->university_id);
        $counts = $this->getCounts($faculty);
        return view('Faculty.show', ['faculty' => $faculty, 'university' => $university, 'counts' => $counts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {   
        $universities = University::all();
        return view('Faculty.edit', compact('faculty', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());
        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully');
    }


    /**
     * Get the counts for a specific faculty.
     */
    private function getCounts(Faculty $faculty=null)
    {
       if($faculty){
        $majorsCount = DB::table('majors')
            ->where('faculty_id', $faculty->id)
            ->count();
        
        $groupsCount = DB::table('groups')
            ->join('majors', 'groups.major_id', '=', 'majors.id')
            ->where('majors.faculty_id', $faculty->id)
            ->count();
        $studentsCount = DB::table('students')
            ->join('groups', 'students.group_id', '=', 'groups.id')
            ->join('majors', 'groups.major_id', '=', 'majors.id')
            ->where('majors.faculty_id', $faculty->id)
            ->count();
        
        return [
            'majorsCount' => $majorsCount,
            'groupsCount' => $groupsCount,
            'studentsCount' => $studentsCount,
        ];
       }else{
        // Global counts
        $facultiesCount = DB::table('faculties')->count();
        $majorsCount = DB::table('majors')->count();
        $groupsCount = DB::table('groups')->count();
        $studentsCount = DB::table('students')->count();
        
        return [
            'facultiesCount' => $facultiesCount,
            'majorsCount' => $majorsCount,
            'groupsCount' => $groupsCount,
            'studentsCount' => $studentsCount,
        ];
    }
}
}
