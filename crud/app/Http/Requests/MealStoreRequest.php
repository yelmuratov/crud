<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'ingredient_ids' => ['array'],
            'ingredient_ids.*' => ['integer', 'exists:ingredients,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'ingredient_ids.*.exists' => 'The selected ingredient is invalid.',
        ];
    }
}
