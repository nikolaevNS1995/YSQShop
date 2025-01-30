<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CartProductUpdateRequest extends FormRequest
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
            'quantity' => 'required|integer|min:1',
        ];
    }

    public function attributes(): array
    {
        return [
            'quantity' => 'Количество',
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required' => 'Поле ":attribute" обязательно.',
            'quantity.integer' => 'Поле ":attribute" должно быть целым числом.',
            'quantity.min' => 'Минимальное значение ":attribute" — 1.',
        ];
    }
}
