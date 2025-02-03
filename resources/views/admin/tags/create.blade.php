@extends('adminlte::page')

@section('title', 'Добавить тег')

@section('content_header')
    <h1>Добавить тег</h1>
@stop

@section('content')
    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
