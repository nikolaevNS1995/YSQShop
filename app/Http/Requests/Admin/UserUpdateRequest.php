<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,manager,user',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'E-mail',
            'phone' => 'Телефон',
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
            'email.email' => 'Поле ":attribute" должно быть валидным email-адресом.',
            'email.unique' => 'Этот ":attribute" уже зарегистрирован.',
            'phone.max' => 'Поле ":attribute" не должно превышать 20 символов.',
            'password.min' => 'Минимальная длина ":attribute" – 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
            'role.required' => 'Поле ":attribute" обязательно.',
            'role.in' => 'Выбранное значение для ":attribute" недопустимо.',
        ];
    }
}
