@extends('adminlte::page')

@section('title', 'Добавить размер')

@section('content_header')
    <h1>Добавить размер</h1>
@stop

@section('content')
    <form action="{{ route('admin.sizes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Тип размера</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Размер производителя</label>
            <input type="text" name="manufacturer_size" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Российский размер</label>
            <input type="text" name="russian_size" class="form-control">
        </div>

        <div class="form-group">
            <label>Обхват груди (см)</label>
            <input type="number" name="bust_circumference" class="form-control">
        </div>

        <div class="form-group">
            <label>Обхват бедер (см)</label>
            <input type="number" name="hip_circumference" class="form-control">
        </div>

        <div class="form-group">
            <label>Обхват талии (см)</label>
            <input type="number" name="waist_circumference" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.sizes.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
