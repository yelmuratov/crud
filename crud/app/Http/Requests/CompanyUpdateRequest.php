<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            "user_id" => "required|exists:users,id",
            'name' => 'required|string|max:255',
            "description" => "required|string",
            'website' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User ID is required',
            'user_id.exists' => 'User ID does not exist',
            'name.required' => 'Company name is required',
            'name.string' => 'Company name must be a string',
            'name.max' => 'Company name must not exceed 255 characters',
            'description.required' => 'Company description is required',
            'description.string' => 'Company description must be a string',
            'website.url' => 'Company website must be a valid URL',
            'website.max' => 'Company website must not exceed 255 characters',
        ];
    }
}
