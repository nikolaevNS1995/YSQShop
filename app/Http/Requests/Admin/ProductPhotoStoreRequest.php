<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductPhotoStoreRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_main' => 'boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id' => 'Товар',
            'image' => 'Изображение',
            'is_main' => 'Главное фото',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Выберите ":attribute".',
            'product_id.exists' => 'Выбранный ":attribute" не существует.',
            'image.required' => 'Поле ":attribute" обязательно.',
            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Допустимые форматы: jpeg, png, jpg, gif.',
            'image.max' => 'Максимальный размер изображения – 2MB.',
            'is_main.boolean' => 'Поле ":attribute" должно быть true или false.',
        ];
    }
}
