<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PromotionStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:promotions,title',
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'valid_until' => 'required|date|after:today',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название акции',
            'discount_percentage' => 'Процент скидки',
            'valid_until' => 'Дата окончания',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле ":attribute" обязательно.',
            'title.unique' => 'Акция с таким ":attribute" уже существует.',
            'discount_percentage.required' => 'Поле ":attribute" обязательно.',
            'discount_percentage.numeric' => 'Поле ":attribute" должно быть числом.',
            'discount_percentage.min' => 'Минимальное значение ":attribute" — 1%.',
            'discount_percentage.max' => 'Максимальное значение ":attribute" — 100%.',
            'valid_until.required' => 'Поле ":attribute" обязательно.',
            'valid_until.date' => 'Поле ":attribute" должно быть датой.',
            'valid_until.after' => 'Дата окончания должна быть в будущем.',
        ];
    }
}
