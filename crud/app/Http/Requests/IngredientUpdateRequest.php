<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "string",
            "meals" => "nullable|required|array",
            "meals.*.name" => "required|string",
        ];
    }

    public function messages(): array
    {
        return [
            "name.string" => "Name must be a string",
            "meals.required" => "Meals are required",
            "meals.array" => "Meals must be an array",
            "meals.*.name.required" => "Meal name is required",
            "meals.*.name.string" => "Meal name must be a string",
        ];
    }
}
