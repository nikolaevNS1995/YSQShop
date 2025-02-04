@extends('adminlte::page')

@section('title', 'Корзина - ' . $cart->user->email)

@section('content_header')
    <h1>Корзина пользователя {{ $cart->user->email }}</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart->products as $product)
            <tr>
                <td>{{ $product->productCard->title }}</td>
                <td>{{ $product->price }} ₽</td>
                <td>
                    <form action="{{ route('admin.carts.updateProduct', ['cart' => $cart, 'product' => $product]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1">
                        <button type="submit" class="btn btn-primary btn-sm">Обновить</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.carts.removeProduct', ['cart' => $cart, 'product' => $product]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
