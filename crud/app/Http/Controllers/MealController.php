<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class MealController extends Controller
{
    public function index()
    {   
        $meals = Meal::paginate(10);
        return view('Meals.index', ['meals' => $meals]);
    }

    public function store(Request $request)
    {
        $meal = Meal::create($request->only('name'));
        if ($request->has('ingredient_ids')) {
            $meal->ingredients()->sync($request->ingredient_ids);
        }
        
        return redirect()->route('meals.index')->with('message', 'Meal created successfully');
    }

    public function create()
    {   
        $ingredients = Ingredient::all();
        
        return view('Meals.create', ['ingredients' => $ingredients]);
    }

    public function show(Meal $meal)
    {
        return view('Meals.show', ['meal' => $meal]);
    }

    public function edit(Meal $meal)
    {
        $ingredients = Ingredient::all();
        return view('Meals.edit', ['meal' => $meal, 'ingredients' => $ingredients]);
    }

    public function update(Request $request, Meal $meal)
    {
        $meal->update($request->only('name'));
        if ($request->has('ingredient_ids')) {
            $meal->ingredients()->sync($request->ingredient_ids);
        }

        return redirect()->route('meals.index')->with('message', 'Meal updated successfully');
    }

    public function destroy(Meal $meal)
    {   
        // Many to many meal ingredient relationship is deleted
        $meal->ingredients()->detach();
        $meal->delete();
        return redirect()->route('meals.index')->with('message', 'Meal deleted successfully');
    }
}
