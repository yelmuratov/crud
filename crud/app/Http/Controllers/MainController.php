<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MainController extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        return view('index',['meals' => $meals]);
    }

}
