<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MainController;


Route::get('/',[MainController::class, 'index'])->name('index');
// Meals routes
Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');
Route::post('/meals', [MealController::class, 'store'])->name('meals.store');
Route::get('/meals/{meal}', [MealController::class, 'show'])->name('meals.show');
Route::get('/meals/{meal}/edit', [MealController::class, 'edit'])->name('meals.edit');
Route::put('/meals/{meal}', [MealController::class, 'update'])->name('meals.update');
Route::delete('/meals/{meal}', [MealController::class, 'destroy'])->name('meals.destroy');

// Ingredients routes
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

