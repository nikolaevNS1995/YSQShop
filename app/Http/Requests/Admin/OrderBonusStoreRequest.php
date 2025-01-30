<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderBonusStoreRequest extends FormRequest
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
            'loyalty_program_id' => 'required|exists:loyalty_programs,id',
            'order_id' => 'required|exists:orders,id',
            'points_used' => 'required|integer|min:0',
        ];
    }

    public function attributes(): array
    {
        return [
            'loyalty_program_id' => 'Программа лояльности',
            'order_id' => 'Заказ',
            'points_used' => 'Количество использованных баллов',
        ];
    }

    public function messages(): array
    {
        return [
            'loyalty_program_id.required' => 'Выберите ":attribute".',
            'loyalty_program_id.exists' => 'Выбранная ":attribute" не существует.',
            'order_id.required' => 'Выберите ":attribute".',
            'order_id.exists' => 'Выбранный ":attribute" не существует.',
            'points_used.required' => 'Поле ":attribute" обязательно.',
            'points_used.integer' => 'Поле ":attribute" должно быть целым числом.',
            'points_used.min' => 'Минимальное значение ":attribute" — 0.',
        ];
    }
}
