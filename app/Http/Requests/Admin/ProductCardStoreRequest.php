<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCardStoreRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255|unique:product_cards,title',
            'description' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'Категория',
            'title' => 'Название карточки товара',
            'description' => 'Описание',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Выберите ":attribute".',
            'category_id.exists' => 'Выбранная ":attribute" не существует.',
            'title.required' => 'Поле ":attribute" обязательно.',
            'title.unique' => 'Такое ":attribute" уже существует.',
        ];
    }
}
