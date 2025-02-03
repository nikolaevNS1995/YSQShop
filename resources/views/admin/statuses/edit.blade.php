@extends('adminlte::page')

@section('title', 'Редактировать статус')

@section('content_header')
    <h1>Редактировать статус</h1>
@stop

@section('content')
    <form action="{{ route('admin.statuses.update', $status) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ $status->title }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.statuses.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
