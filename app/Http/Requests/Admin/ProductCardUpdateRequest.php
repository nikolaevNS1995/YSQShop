<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCardUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'sku' => 'required|string|max:100|unique:product_cards,sku,' . $this->id,
            'weight' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'published' => 'boolean',
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
