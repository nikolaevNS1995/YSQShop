<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderBonusUpdateRequest extends FormRequest
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
            'points_used' => 'required|integer|min:0',
        ];
    }

    public function attributes(): array
    {
        return [
            'points_used' => 'Количество использованных баллов',
        ];
    }

    public function messages(): array
    {
        return [
            'points_used.required' => 'Поле ":attribute" обязательно.',
            'points_used.integer' => 'Поле ":attribute" должно быть целым числом.',
            'points_used.min' => 'Минимальное значение ":attribute" — 0.',
        ];
    }
}
