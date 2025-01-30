<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,id',
            'session_id' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Пользователь',
            'session_id' => 'Сессия гостя',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.exists' => 'Выбранный ":attribute" не существует.',
            'session_id.string' => 'Поле ":attribute" должно быть строкой.',
        ];
    }
}
