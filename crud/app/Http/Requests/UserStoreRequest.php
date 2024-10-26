<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            "name" => "required|string|max:255",
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'User name is required',
            'name.string' => 'User name must be a string',
            'name.max' => 'User name must not exceed 255 characters',
            'email.required' => 'User email is required',
            'email.email' => 'User email must be a valid email',
            'email.unique' => 'User email already exists',
            'password.required' => 'User password is required',
            'password.string' => 'User password must be a string',
            'password.min' => 'User password must be at least 8 characters',
        ];
    }
}
