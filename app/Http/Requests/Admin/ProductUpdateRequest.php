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
            'title' => 'required|string|max:255|unique:products,title,' . $this->product->id,
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'published' => 'boolean',
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
