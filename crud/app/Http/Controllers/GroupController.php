<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Major;
use App\Models\University;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::paginate(10);
        return view('Group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $universities = University::all();
        $faculties = Faculty::all();
        $groups = Group::all();
        return view('Group.create', compact('universities', 'faculties', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        Group::create($request->validated());
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {   
        $counts = $this->getCounts($group);
        $major = Major::find($group->major_id);
        $faculty = Faculty::find($major->faculty_id);
        $university = University::find($faculty->university_id);
        return view('Group.show', compact('group', 'major', 'faculty', 'university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {   
        $universities = University::all();
        $faculties = Faculty::all();
        $majors = Major::all();

        // current data
        $currentMajor = Major::find($group->major_id);
        $currentFaculty = Faculty::find($currentMajor->faculty_id);
        $currentUniversity = University::find($currentFaculty->university_id);

        return view('Group.edit', [
            'group' => $group,
            'universities' => $universities,
            'faculties' => $faculties,
            'majors' => $majors,
            'currentMajor' => $currentMajor,
            'currentFaculty' => $currentFaculty,
            'currentUniversity' => $currentUniversity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }

    private function getCounts(Group $group)
    {
        if($group){
            $studentCount = $group->students->count();
            return $studentCount;
        }else{
            $studentCount = DB::table('students')->count();
            return $studentCount;
        }
}
}
