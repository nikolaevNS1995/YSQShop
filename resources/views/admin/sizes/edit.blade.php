@extends('adminlte::page')

@section('title', 'Редактировать размер')

@section('content_header')
    <h1>Редактировать размер</h1>
@stop

@section('content')
    <form action="{{ route('admin.sizes.update', $size) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Тип размера</label>
            <input type="text" name="type" class="form-control" value="{{ $size->type }}" required>
        </div>

        <div class="form-group">
            <label>Размер производителя</label>
            <input type="text" name="manufacturer_size" class="form-control" value="{{ $size->manufacturer_size }}" required>
        </div>

        <div class="form-group">
            <label>Российский размер</label>
            <input type="text" name="russian_size" class="form-control" value="{{ $size->russian_size }}">
        </div>

        <div class="form-group">
            <label>Обхват груди (см)</label>
            <input type="number" name="bust" class="form-control" value="{{ $size->bust_circumference }}">
        </div>

        <div class="form-group">
            <label>Обхват бедер (см)</label>
            <input type="number" name="hips" class="form-control" value="{{ $size->hip_circumference }}">
        </div>

        <div class="form-group">
            <label>Обхват талии (см)</label>
            <input type="number" name="waist" class="form-control" value="{{ $size->waist_circumference }}">
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.sizes.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
