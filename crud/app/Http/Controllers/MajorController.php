<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use App\Models\University;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $majors = Major::paginate(10);
        return view('Major.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $universities = University::all();
        $faculties = Faculty::all();
        return view('Major.create', compact('universities', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMajorRequest $request)
    {
        Major::create($request->all());
        return redirect()->route('majors.index')->with('success', 'Major created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {   
        $counts = $this->getCounts($major);
        $faculty = Faculty::find($major->faculty_id);
        $university = University::find($faculty->university_id);
        return view('Major.show', compact('major', 'counts', 'university', 'faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {   
        $universities = University::all();
        $faculties = Faculty::all();

        // Take university 
        $faculty = Faculty::find($major->faculty_id);
        $CurrentUniversity = University::find($faculty->university_id);

        return view('Major.edit', compact('major', 'universities', 'faculties', 'CurrentUniversity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        $major->update($request->all());
        return redirect()->route('majors.index')->with('success', 'Major updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->back()->with('success', 'Major deleted successfully.');
    }

    private function getCounts(Major $major)
    {
        if($major){
            $groupCount = $major->groups->count();
            $studentCount = DB::table('students')->whereIn('group_id', $major->groups->pluck('id'))->count();
            return ['groupCount' => $groupCount, 'studentCount' => $studentCount];
        }else{
            // Global count
            $groupCount = DB::table('groups')->count();
            $studentCount = DB::table('students')->count();
            return ['groupCount' => $groupCount, 'studentCount' => $studentCount];
        }
    }
}
