@extends('adminlte::page')

@section('title', 'Редактировать заказ')

@section('content_header')
    <h1>Редактировать заказ #{{ $order->id }}</h1>
@stop

@section('content')
    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Пользователь</label>
            <select name="user_id" class="form-control">
                <option value="">Гость</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Статус</label>
            <select name="status_id" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Сумма заказа (₽)</label>
            <input type="number" name="total_price" class="form-control" value="{{ $order->total_price }}" required>
        </div>

        <h4>Товары в заказе</h4>
        <div class="form-group">
            @foreach($products as $product)
                <div class="form-check">
                    @php
                        $existingProduct = $order->products->where('id', $product->id)->first();
                        $quantity = $existingProduct ? $existingProduct->quantity : 0;
                    @endphp
                    <label>
                        <input type="number" name="products[{{ $product->id }}]" class="form-control" min="0" value="{{ $quantity }}">
                        {{ $product->productCard->title }} ({{ $product->price }} ₽)
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
