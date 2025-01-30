<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ColorUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:colors,title,' . $this->color->id,
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название цвета',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле ":attribute" обязательно.',
            'title.unique' => 'Такой ":attribute" уже существует.',
        ];
    }
}
