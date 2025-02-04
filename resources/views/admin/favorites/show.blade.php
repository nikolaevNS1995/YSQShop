@extends('adminlte::page')

@section('title', 'Избранное - ' . $favorite->user->email)

@section('content_header')
    <h1>Избранные товары пользователя {{ $favorite->user->email }}</h1>
@stop

@section('content')
    <!-- Форма добавления товара -->
    <form action="{{ route('admin.favorites.addProduct', $favorite) }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label>Выберите товар:</label>
                <select name="product_id" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->productCard->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label>Количество:</label>
                <input type="number" name="quantity" class="form-control" min="1" value="1">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success mt-4">Добавить</button>
            </div>
        </div>
    </form>

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
        @foreach($favorite->products as $product)
            <tr>
                <td>{{ $product->productCard->title }}</td>
                <td>{{ $product->price }} ₽</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>
                    <form action="{{ route('admin.favorites.removeProduct', ['favorite' => $favorite, 'product' => $product]) }}" method="POST">
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
