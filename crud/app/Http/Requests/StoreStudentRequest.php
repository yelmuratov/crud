<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'group_id' => 'required|exists:groups,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'image' => 'required|image',
        ];
    }

    public function messages(): array
    {
        return [
            'group_id.required' => 'Group is required',
            'group_id.exists' => 'Group is not exists',
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'name.max' => 'Name must be less than 255 characters',
            'phone.required' => 'Phone is required',
            'phone.string' => 'Phone must be string',
            'phone.max' => 'Phone must be less than 255 characters',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be image',
        ];
    }
}
