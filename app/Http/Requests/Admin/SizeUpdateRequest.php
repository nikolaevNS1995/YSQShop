<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SizeUpdateRequest extends FormRequest
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
            'type' => 'required|string|max:255',
            'manufacturer_size' => 'required|string|max:50|unique:sizes,manufacturer_size,' . $this->size->id,
            'russian_size' => 'nullable|string|max:50',
            'bust_circumference' => 'nullable|numeric|min:0',
            'hip_circumference' => 'nullable|numeric|min:0',
            'waist_circumference' => 'nullable|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Тип размера обязателен.',
            'manufacturer_size.required' => 'Размер производителя обязателен.',
            'manufacturer_size.unique' => 'Такой размер производителя уже существует.',
        ];
    }
}
