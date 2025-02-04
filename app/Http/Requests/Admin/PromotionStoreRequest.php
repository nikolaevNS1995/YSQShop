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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_value' => 'required|numeric|min:0',
            'discount_unit' => 'required|string|in:%,₽',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
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
