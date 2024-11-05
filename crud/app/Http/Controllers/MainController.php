<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\Post;

class MainController extends Controller
{
    public function home()
    {   
        $user = Auth::user(); 
        
        if ($user && $user->role === 'admin') {
            $universityCount = University::count();
            $facilitiesCount = Faculty::count();
            $majorsCount = Major::count();
            $groupsCount = Group::count();
            $studentCount = Student::count();

            return view('index', [
                'universityCount' => $universityCount,
                'facilitiesCount' => $facilitiesCount,
                'majorsCount' => $majorsCount,
                'groupsCount' => $groupsCount,
                'studentCount' => $studentCount,
                'userRole' => $user->role, // Pass user role to view
            ]);
        } elseif ($user && $user->role === 'student') {
            
        }else{
            return view('User.index');
        }
    }

    public function blogs()
    {   
        $posts = Post::latest()->get();
        return view('User.blog');
    }

    public function contact()
    {
        return view('User.contact');
    }
}
