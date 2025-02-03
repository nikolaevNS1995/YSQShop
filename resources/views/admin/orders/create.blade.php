@extends('adminlte::page')

@section('title', 'Добавить заказ')

@section('content_header')
    <h1>Добавить заказ</h1>
@stop

@section('content')
    <form action="{{ route('admin.orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Пользователь</label>
            <select name="user_id" class="form-control">
                <option value="">Гость</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Статус</label>
            <select name="status_id" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Товары</label>
            @foreach($products as $product)
                <div class="form-check">
                    <input type="number" name="products[{{ $product->id }}]" class="form-control" min="0" value="0">
                    {{ $product->productCard->title }} ({{ $product->price }} ₽)
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
