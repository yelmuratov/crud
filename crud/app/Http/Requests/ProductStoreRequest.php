<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            "company_id" => "required|exists:companies,id",
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required',
            'name.string' => 'Product name must be a string',
            'name.max' => 'Product name must not exceed 255 characters',
            'description.required' => 'Product description is required',
            'description.string' => 'Product description must be a string',
            'price.required' => 'Product price is required',
            'price.numeric' => 'Product price must be a number',
            'image.image' => 'Product image must be an image',
            'image.mimes' => 'Product image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'Product image must not be larger than 2048 kilobytes',
        ];
    }
}
