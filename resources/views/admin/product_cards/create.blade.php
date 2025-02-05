@extends('adminlte::page')

@section('title', 'Добавить карточку товара')

@section('content_header')
    <h1>Добавить карточку товара</h1>
@stop

@section('content')
    <form action="{{ route('admin.product-cards.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Категория</label>
            <select name="category_id" class="form-control">
                <option value="">Без категории</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Артикул</label>
            <input type="text" name="article" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label>Вес (кг)</label>
                <input type="number" name="weight" class="form-control" step="0.01">
            </div>
            <div class="col-md-3">
                <label>Высота (см)</label>
                <input type="number" name="height" class="form-control" step="0.01">
            </div>
            <div class="col-md-3">
                <label>Ширина (см)</label>
                <input type="number" name="width" class="form-control" step="0.01">
            </div>
            <div class="col-md-3">
                <label>Длина (см)</label>
                <input type="number" name="length" class="form-control" step="0.01">
            </div>
        </div>

        <div class="form-group mt-3">
            <label>Цена (₽)</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>

        <div class="form-check">
            <input type="checkbox" name="published" value="1" class="form-check-input">
            <label class="form-check-label">Опубликовать</label>
        </div>

        <button type="submit" class="btn btn-success mt-3">Создать</button>
        <a href="{{ route('admin.product-cards.index') }}" class="btn btn-secondary mt-3">Отмена</a>
    </form>
@stop
