<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
{
    // Load the JSON data (assuming it's stored in storage/app/meals.json)
    $meals = json_decode(file_get_contents(storage_path('app/meals.json')), true);

    // Pass data to the view
    return view('meals.index', compact('meals'));
}

}
