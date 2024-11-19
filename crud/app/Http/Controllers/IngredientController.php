<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientStoreRequest;
use App\Http\Requests\IngredientUpdateRequest;
use App\Models\Ingredient;

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

    public function store(IngredientStoreRequest $request)
    {   
        try{
            Ingredient::create($request->only('name'));
            return redirect()->route('ingredients.index')->with('success', 'Ingredient created successfully'); 
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    public function show(Ingredient $ingredient)
    {   
        return view('Ingredients.show', ['ingredient' => $ingredient]);
    }

    public function edit(Ingredient $ingredient)
    {
        return view('Ingredients.edit', ['ingredient' => $ingredient]);
    }

    public function update(IngredientUpdateRequest $request, Ingredient $ingredient)
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

