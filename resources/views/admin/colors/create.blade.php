@extends('adminlte::page')

@section('title', 'Добавить цвет')

@section('content_header')
    <h1>Добавить цвет</h1>
@stop

@section('content')
    <form action="{{ route('admin.colors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
