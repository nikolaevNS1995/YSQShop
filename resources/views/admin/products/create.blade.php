@extends('adminlte::page')

@section('title', 'Добавить товар')

@section('content_header')
    <h1>Добавить товар</h1>
@stop

@section('content')
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Карточка товара</label>
            <select name="product_card_id" class="form-control" required>
                <option value="">Выберите карточку товара</option>
                @foreach($productCards as $productCard)
                    <option value="{{ $productCard->id }}">{{ $productCard->title }} ({{ $productCard->price }} ₽)</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Размер</label>
            <select name="size_id" class="form-control">
                <option value="">Выберите размер</option>
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Цвет</label>
            <select name="color_id" class="form-control">
                <option value="">Выберите цвет</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Количество</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
