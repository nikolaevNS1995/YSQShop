<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'status_id' => 'required|exists:statuses,id',
            'total_price' => 'required|numeric|min:0',
            'products' => 'nullable|array',
            'products.*' => 'integer|min:0'
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Пользователь',
            'total_price' => 'Общая стоимость',
            'status' => 'Статус заказа',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Выберите ":attribute".',
            'user_id.exists' => 'Выбранный ":attribute" не существует.',
            'total_price.required' => 'Поле ":attribute" обязательно.',
            'total_price.numeric' => 'Поле ":attribute" должно быть числом.',
            'status.required' => 'Поле ":attribute" обязательно.',
            'status.in' => 'Недопустимый ":attribute".',
        ];
    }
}
