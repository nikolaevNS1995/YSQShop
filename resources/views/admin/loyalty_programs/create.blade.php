@extends('adminlte::page')

@section('title', 'Добавить участника')

@section('content_header')
    <h1>Добавить участника</h1>
@stop

@section('content')
    <form action="{{ route('admin.loyalty-programs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Пользователь</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Количество бонусов</label>
            <input type="number" name="bonus_points" class="form-control" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.loyalty-programs.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
