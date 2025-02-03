@extends('adminlte::page')

@section('title', 'Добавить статус')

@section('content_header')
    <h1>Добавить статус</h1>
@stop

@section('content')
    <form action="{{ route('admin.statuses.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.statuses.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
