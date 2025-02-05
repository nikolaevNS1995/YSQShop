@extends('adminlte::page')

@section('title', 'Добавить пользователя')

@section('content_header')
    <h1>Добавить пользователя</h1>
@stop

@section('content')
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="last_name" class="form-control">
        </div>

        <div class="form-group">
            <label>Телефон</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Роль</label>
            <select name="role" class="form-control">
                <option value="user">Пользователь</option>
                <option value="admin">Администратор</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
