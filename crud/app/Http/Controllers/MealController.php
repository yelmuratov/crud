<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
        return Meal::with('ingredients')->get();
    }

    public function store(Request $request)
    {
        $meal = Meal::create($request->only('name'));
        if ($request->has('ingredient_ids')) {
            $meal->ingredients()->sync($request->ingredient_ids);
        }
        return $meal;
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
