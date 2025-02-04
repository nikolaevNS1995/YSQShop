@extends('adminlte::page')

@section('title', 'Добавить акцию')

@section('content_header')
    <h1>Добавить новую акцию</h1>
@stop

@section('content')
    <form action="{{ route('admin.promotions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Размер скидки</label>
                <input type="number" name="discount_value" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Тип скидки</label>
                <select name="discount_unit" class="form-control">
                    <option value="%">%</option>
                    <option value="₽">₽</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Дата начала</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Дата окончания</label>
                <input type="date" name="end_date" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Создать</button>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary mt-3">Отмена</a>
    </form>
@stop
