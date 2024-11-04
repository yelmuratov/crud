<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'group_id' => 'exists:groups,id',
            'name' => 'string|max:255',
            'phone' => 'string|max:255',
            'image' => 'image',
        ];
    }

    public function messages(): array
    {
        return [
            'group_id.exists' => 'Group is not exists',
            'name.string' => 'Name must be string',
            'name.max' => 'Name must be less than 255 characters',
            'phone.string' => 'Phone must be string',
            'phone.max' => 'Phone must be less than 255 characters',
            'image.image' => 'Image must be image',
        ];
    }
}
