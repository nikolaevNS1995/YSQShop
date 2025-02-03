@extends('adminlte::page')

@section('title', 'Просмотр заказа')

@section('content_header')
    <h1>Просмотр заказа #{{ $order->id }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Пользователь:</strong> {{ $order->user->email ?? 'Гость' }}</p>
            <p><strong>Статус:</strong> {{ $order->status->title }}</p>
            <p><strong>Сумма:</strong> {{ $order->total_price }} ₽</p>

            <h4>Товары:</h4>
            <ul>
                @foreach($order->products as $product)
                    <li>{{ $product->product->productCard->title }} ({{ $product->quantity }} шт. по {{ $product->price }} ₽)</li>
                @endforeach
            </ul>

            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
@stop
