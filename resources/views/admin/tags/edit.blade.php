@extends('adminlte::page')

@section('title', 'Редактировать тег')

@section('content_header')
    <h1>Редактировать тег</h1>
@stop

@section('content')
    <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ $tag->title }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
