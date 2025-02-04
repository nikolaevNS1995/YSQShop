@extends('adminlte::page')

@section('title', 'Акция - ' . $promotion->title)

@section('content_header')
    <h1>Акция: {{ $promotion->title }}</h1>
@stop

@section('content')
    <p><strong>Описание:</strong> {{ $promotion->description }}</p>
    <p><strong>Скидка:</strong> {{ $promotion->discount_value }} {{ $promotion->discount_unit }}</p>
    <p><strong>Даты:</strong> {{ $promotion->start_date->format('d.m.Y') }} - {{ $promotion->end_date ? $promotion->end_date->format('d.m.Y') : 'Бессрочно' }}</p>

    <hr>

    <h4>Добавленные товары:</h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotion->products as $product)
            <tr>
                <td>{{ $product->productCard->title }}</td>
                <td>{{ $product->price }} ₽</td>
                <td>
                    <form action="{{ route('admin.promotions.removeProduct', ['promotion' => $promotion, 'product' => $product]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Добавить товар в акцию:</h4>
    <form action="{{ route('admin.promotions.addProduct', $promotion) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <select name="product_id" class="form-control">
                    @foreach(\App\Models\Product::all() as $product)
                        <option value="{{ $product->id }}">{{ $product->productCard->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>

    <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary mt-3">Назад</a>
@stop
