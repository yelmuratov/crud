<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {   
        $ingredients = Ingredient::paginate(10);
        return view('Ingredients.index', ['ingredients' => $ingredients]);
    }

    public function create()
    {
        return view('Ingredients.create');
    }

    public function store(Request $request)
    {   
        Ingredient::create($request->only('name'));
        return redirect()->route('ingredients.index')->with('success', 'Ingredient created successfully'); 
    }

    public function show(Ingredient $ingredient)
    {   
        return view('Ingredients.show', ['ingredient' => $ingredient]);
    }

    public function edit(Ingredient $ingredient)
    {
        return view('Ingredients.edit', ['ingredient' => $ingredient]);
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update($request->only('name'));
        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->meals()->detach();
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully');
    }
}

