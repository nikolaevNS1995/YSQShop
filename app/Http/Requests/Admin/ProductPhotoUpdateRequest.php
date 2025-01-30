<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductPhotoUpdateRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_main' => 'boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'Изображение',
            'is_main' => 'Главное фото',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Допустимые форматы: jpeg, png, jpg, gif.',
            'image.max' => 'Максимальный размер изображения – 2MB.',
            'is_main.boolean' => 'Поле ":attribute" должно быть true или false.',
        ];
    }
}
