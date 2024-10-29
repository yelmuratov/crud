<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class MealController extends Controller
{
    public function index()
    {   
        $meals = Meal::all();
        return view('Meals.index', ['meals' => $meals]);
    }

    public function store(Request $request)
    {
        $meal = Meal::create($request->only('name'));
        if ($request->has('ingredient_ids')) {
            $meal->ingredients()->sync($request->ingredient_ids);
        }
        return redirect()->route('meals.index');
    }

    public function create()
    {   
        $ingredients = Ingredient::all();
        return view('Meals.create', ['ingredients' => $ingredients]);
    }

    public function show(Meal $meal)
    {
        return $meal->load('ingredients');
    }

    public function update(Request $request, Meal $meal)
    {
        $meal->update($request->only('name'));
        if ($request->has('ingredient_ids')) {
            $meal->ingredients()->sync($request->ingredient_ids);
        }
        return $meal;
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();
        return response()->noContent();
    }
}
