<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        return Ingredient::with('meals')->get();
    }

    public function store(Request $request)
    {
        return Ingredient::create($request->only('name'));
    }

    public function show(Ingredient $ingredient)
    {
        return $ingredient->load('meals');
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update($request->only('name'));
        return $ingredient;
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response()->noContent();
    }
}

