@extends('adminlte::page')

@section('title', 'Редактировать цвет')

@section('content_header')
    <h1>Редактировать цвет</h1>
@stop

@section('content')
    <form action="{{ route('admin.colors.update', $color) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ $color->title }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
