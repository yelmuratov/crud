<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "ingredients" => "required|array",
            "ingredients.*.name" => "required|string",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "ingredients.required" => "Ingredients are required",
            "ingredients.array" => "Ingredients must be an array",
            "ingredients.*.name.required" => "Ingredient name is required",
            "ingredients.*.name.string" => "Ingredient name must be a string",
        ];
    }
}
