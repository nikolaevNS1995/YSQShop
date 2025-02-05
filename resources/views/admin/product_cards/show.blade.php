@extends('adminlte::page')

@section('title', 'Карточка товара - ' . $productCard->title)

@section('content_header')
    <h1>Карточка товара: {{ $productCard->title }}</h1>
@stop

@section('content')
    <p><strong>Категория:</strong> {{ $productCard->category->title ?? 'Без категории' }}</p>
    <p><strong>Артикул:</strong> {{ $productCard->sku }}</p>
    <p><strong>Цена:</strong> {{ $productCard->price }} ₽</p>
    <p><strong>Опубликован:</strong> {{ $productCard->published ? 'Да' : 'Нет' }}</p>

    <h4>Товары (размеры, цвета):</h4>
    <ul>
        @foreach($productCard->products as $product)
            <li>{{ $product->size->title ?? 'Без размера' }} / {{ $product->color->title ?? 'Без цвета' }}</li>
        @endforeach
    </ul>

    <a href="{{ route('admin.product-cards.index') }}" class="btn btn-secondary">Назад</a>
@stop
