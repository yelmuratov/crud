<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'major_id' => 'required|integer|exists:majors,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên lớp không được để trống',
            'name.string' => 'Tên lớp phải là chuỗi',
            'name.max' => 'Tên lớp không được vượt quá 255 ký tự',
            'major_id.required' => 'Mã ngành không được để trống',
            'major_id.integer' => 'Mã ngành phải là số nguyên',
            'major_id.exists' => 'Mã ngành không tồn tại',
        ];
    }
}
