<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            "company_id" => "required",
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "description" => "required|string|max:255",
            "count" => "required|numeric|min:0",   
        ];
    }

    public function messages(): array
    {
        return [
            "company_id.required" => "Company is required",
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "name.max" => "Name must be less than 255 characters",
            "price.required" => "Price is required",
            "price.numeric" => "Price must be a number",
            "price.min" => "Price must be a positive number",
            "description.required" => "Description is required",
            "description.string" => "Description must be a string",
            "count.required" => "Count is required",
            "count.numeric" => "Count must be a number",
            "count.min" => "Count must be a positive number",
        ];
    }
}
