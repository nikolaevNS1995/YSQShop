<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string|in:admin,manager,user',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'role' => 'Роль',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле ":attribute" обязательно.',
            'last_name.required' => 'Поле ":attribute" обязательно.',
            'email.required' => 'Поле ":attribute" обязательно.',
            'email.unique' => 'Этот ":attribute" уже зарегистрирован.',
            'password.required' => 'Поле ":attribute" обязательно.',
            'password.confirmed' => 'Пароли не совпадают.',
            'role.required' => 'Выберите ":attribute".',
        ];
    }
}
