@extends('adminlte::page')

@section('title', 'Редактировать программу лояльности')

@section('content_header')
    <h1>Редактировать программу лояльности для {{ $loyaltyProgram->user->email }}</h1>
@stop

@section('content')
    <form action="{{ route('admin.loyalty-programs.update', $loyaltyProgram) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Количество бонусов</label>
            <input type="number" name="bonus_points" class="form-control" min="0" value="{{ $loyaltyProgram->bonus_points }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.loyalty-programs.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
