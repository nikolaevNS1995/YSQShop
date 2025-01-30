<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PromotionProductStoreRequest extends FormRequest
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
            'promotion_id' => 'required|exists:promotions,id',
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'promotion_id' => 'Акция',
            'product_id' => 'Товар',
        ];
    }

    public function messages(): array
    {
        return [
            'promotion_id.required' => 'Выберите ":attribute".',
            'promotion_id.exists' => 'Выбранная ":attribute" не существует.',
            'product_id.required' => 'Выберите ":attribute".',
            'product_id.exists' => 'Выбранный ":attribute" не существует.',
        ];
    }
}
