<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PromoCodeUpdateRequest extends FormRequest
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
            'code' => 'required|string|max:100|unique:promo_codes,code,' . $this->promocode->id,
            'description' => 'nullable|string|max:500',
            'discount_value' => 'required|numeric|min:1',
            'discount_unit' => 'required|in:%,₽',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:1',
            'times_used' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Код промокода обязателен.',
            'code.unique' => 'Такой промокод уже существует.',
            'discount_value.required' => 'Размер скидки обязателен.',
            'discount_unit.required' => 'Выберите тип скидки.',
            'end_date.after_or_equal' => 'Дата окончания должна быть позже даты начала.',
        ];
    }
}
