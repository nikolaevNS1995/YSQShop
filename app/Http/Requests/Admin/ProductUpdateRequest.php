<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
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
            'product_card_id' => 'required|exists:product_cards,id',
            'size_id' => 'nullable|exists:sizes,id',
            'color_id' => 'nullable|exists:colors,id',
            'quantity' => 'required|integer|min:0',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'delete_photos' => 'nullable|array',
            'delete_photos.*' => 'exists:product_photos,id',
            'product_tag_id' => 'nullable|array',
            'product_tag_id.*' => 'exists:tags,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'published' => 'Опубликован',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле ":attribute" обязательно для заполнения.',
            'title.unique' => 'Такое ":attribute" уже существует.',
            'category_id.required' => 'Выберите ":attribute".',
            'category_id.exists' => 'Выбранная ":attribute" не существует.',
            'price.required' => 'Поле ":attribute" обязательно.',
            'price.numeric' => 'Поле ":attribute" должно быть числом.',
            'quantity.required' => 'Поле ":attribute" обязательно.',
            'quantity.integer' => 'Поле ":attribute" должно быть целым числом.',
            'published.boolean' => 'Поле ":attribute" должно быть логическим значением (true/false).',
        ];
    }
}
