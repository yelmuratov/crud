<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            'name' => 'string|max:255',
            'major_id' => 'integer|exists:majors,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'major_id.integer' => 'Major ID must be an integer',
            'major_id.exists' => 'Major ID does not exist',
        ];
    }
}
