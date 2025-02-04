@extends('adminlte::page')

@section('title', 'Редактировать акцию')

@section('content_header')
    <h1>Редактировать акцию "{{ $promotion->title }}"</h1>
@stop

@section('content')
    <form action="{{ route('admin.promotions.update', $promotion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ $promotion->title }}" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" class="form-control">{{ $promotion->description }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Размер скидки</label>
                <input type="number" name="discount_value" class="form-control" value="{{ $promotion->discount_value }}" required>
            </div>
            <div class="col-md-4">
                <label>Тип скидки</label>
                <select name="discount_unit" class="form-control">
                    <option value="%" {{ $promotion->discount_unit == '%' ? 'selected' : '' }}>%</option>
                    <option value="₽" {{ $promotion->discount_unit == '₽' ? 'selected' : '' }}>₽</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Дата начала</label>
                <input type="date" name="start_date" class="form-control" value="{{ $promotion->start_date->format('Y-m-d') }}" required>
            </div>
            <div class="col-md-4">
                <label>Дата окончания</label>
                <input type="date" name="end_date" class="form-control" value="{{ $promotion->end_date ? $promotion->end_date->format('Y-m-d') : '' }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary mt-3">Отмена</a>
    </form>
@stop
