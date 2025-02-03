@extends('adminlte::page')

@section('title', 'Редактировать промокод')

@section('content_header')
    <h1>Редактировать промокод</h1>
@stop

@section('content')
    <form action="{{ route('admin.promocodes.update', $promocode) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Код промокода</label>
            <input type="text" name="code" class="form-control" value="{{ $promocode->code }}" required>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" class="form-control">{{ $promocode->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Размер скидки</label>
            <input type="number" name="discount_value" class="form-control" step="0.01" value="{{ $promocode->discount_value }}" required>
        </div>

        <div class="form-group">
            <label>Тип скидки</label>
            <select name="discount_unit" class="form-control">
                <option value="%" {{ $promocode->discount_unit === '%' ? 'selected' : '' }}>Процент (%)</option>
                <option value="₽" {{ $promocode->discount_unit === '₽' ? 'selected' : '' }}>Фиксированная сумма (₽)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Дата начала действия</label>
            <input type="date" name="start_date" class="form-control"
                   value="{{ $promocode->start_date ? \Carbon\Carbon::parse($promocode->start_date)->format('Y-m-d') : '' }}">
        </div>

        <div class="form-group">
            <label>Дата окончания действия</label>
            <input type="date" name="end_date" class="form-control"
                   value="{{ $promocode->end_date ? \Carbon\Carbon::parse($promocode->end_date)->format('Y-m-d') : '' }}">
        </div>

        <div class="form-group">
            <label>Лимит использования (необязательно)</label>
            <input type="number" name="usage_limit" class="form-control" min="1" value="{{ $promocode->usage_limit }}">
        </div>

        <div class="form-group">
            <label>Количество использований (автообновляется)</label>
            <input type="number" name="times_used" class="form-control" value="{{ $promocode->times_used }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.promocodes.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
