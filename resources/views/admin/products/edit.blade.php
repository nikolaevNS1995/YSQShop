@extends('adminlte::page')

@section('title', 'Редактировать товар')

@section('content_header')
    <h1>Редактировать товар</h1>
@stop

@section('content')
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Выбор карточки товара -->
        <div class="form-group">
            <label>Карточка товара</label>
            <select name="product_card_id" class="form-control" required>
                @foreach($productCards as $productCard)
                    <option value="{{ $productCard->id }}" @if($product->product_card_id == $productCard->id) selected @endif>
                        {{ $productCard->title }} ({{ $productCard->price }} ₽)
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Размер -->
        <div class="form-group">
            <label>Размер</label>
            <select name="size_id" class="form-control">
                <option value="">Выберите размер</option>
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}" @if($product->size_id == $size->id) selected @endif>
                        {{ $size->manufacturer_size }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Цвет -->
        <div class="form-group">
            <label>Цвет</label>
            <select name="color_id" class="form-control">
                <option value="">Выберите цвет</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}" @if($product->color_id == $color->id) selected @endif>
                        {{ $color->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Количество -->
        <div class="form-group">
            <label>Количество</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
        </div>

        <!-- Фото товара -->
        <h4>Фото товара</h4>
        <div class="row mb-3">
            @foreach($product->photos as $photo)
                <div class="col-md-3 text-center">
                    <img src="{{ asset('storage/' . $photo->image_path) }}" class="img-thumbnail mb-2" width="150">
                    <br>
                    <input type="checkbox" name="delete_photos[]" value="{{ $photo->id }}"> Удалить
                </div>
            @endforeach
        </div>

        <!-- Загрузка новых фото -->
        <div class="form-group">
            <label>Добавить новые фото</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
