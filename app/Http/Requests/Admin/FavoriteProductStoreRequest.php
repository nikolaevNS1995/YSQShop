<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteProductStoreRequest extends FormRequest
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
            'favorite_id' => 'required|exists:favorites,id',
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'favorite_id' => 'Избранное',
            'product_id' => 'Товар',
        ];
    }

    public function messages(): array
    {
        return [
            'favorite_id.required' => 'Поле ":attribute" обязательно.',
            'favorite_id.exists' => 'Выбранное ":attribute" не существует.',
            'product_id.required' => 'Поле ":attribute" обязательно.',
            'product_id.exists' => 'Выбранный ":attribute" не существует.',
        ];
    }
}
