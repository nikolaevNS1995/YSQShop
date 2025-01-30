<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CartProductStoreRequest extends FormRequest
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
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ];
    }

    public function attributes(): array
    {
        return [
            'cart_id' => 'Корзина',
            'product_id' => 'Товар',
            'quantity' => 'Количество',
        ];
    }

    public function messages(): array
    {
        return [
            'cart_id.required' => 'Выберите ":attribute".',
            'cart_id.exists' => 'Выбранная ":attribute" не существует.',
            'product_id.required' => 'Выберите ":attribute".',
            'product_id.exists' => 'Выбранный ":attribute" не существует.',
            'quantity.required' => 'Поле ":attribute" обязательно.',
            'quantity.integer' => 'Поле ":attribute" должно быть целым числом.',
            'quantity.min' => 'Минимальное значение ":attribute" — 1.',
        ];
    }
}
