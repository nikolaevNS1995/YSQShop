@extends('adminlte::page')

@section('title', 'Добавить промокод')

@section('content_header')
    <h1>Добавить промокод</h1>
@stop

@section('content')
    <form action="{{ route('admin.promocodes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Код промокода</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Размер скидки</label>
            <input type="number" name="discount_value" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Тип скидки</label>
            <select name="discount_unit" class="form-control">
                <option value="%">Процент (%)</option>
                <option value="₽">Фиксированная сумма (₽)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Дата начала действия</label>
            <input type="date" name="start_date" class="form-control">
        </div>

        <div class="form-group">
            <label>Дата окончания действия</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <div class="form-group">
            <label>Лимит использования (необязательно)</label>
            <input type="number" name="usage_limit" class="form-control" min="1">
        </div>

        <div class="form-group">
            <label>Количество использований (автообновляется)</label>
            <input type="number" name="times_used" class="form-control" value="0" readonly>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.promocodes.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
