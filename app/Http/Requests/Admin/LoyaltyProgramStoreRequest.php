<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoyaltyProgramStoreRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'bonus_points' => 'required|integer|min:0',
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Пользователь',
            'bonus_points' => 'Количество бонусных баллов',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Выберите ":attribute".',
            'user_id.exists' => 'Выбранный ":attribute" не существует.',
            'bonus_points.required' => 'Поле ":attribute" обязательно.',
            'bonus_points.integer' => 'Поле ":attribute" должно быть целым числом.',
            'bonus_points.min' => 'Минимальное значение ":attribute" — 0.',
        ];
    }
}
