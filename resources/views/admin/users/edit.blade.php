@extends('adminlte::page')

@section('title', 'Редактировать пользователя')

@section('content_header')
    <h1>Редактировать пользователя</h1>
@stop

@section('content')
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
        </div>

        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>

        <div class="form-group">
            <label>Телефон</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
        </div>

        <div class="form-group">
            <label>Пароль (оставьте пустым, если не нужно менять)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Роль</label>
            <select name="role" class="form-control">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Пользователь</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Администратор</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@stop
