@extends('adminlte::page')

@section('title', 'Просмотр товара')

@section('content_header')
    <h1>Просмотр товара</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ $product->productCard->title }}</h2>

            <p><strong>Категория:</strong> {{ $product->productCard->category->title ?? 'Без категории' }}</p>
            <p><strong>Цена:</strong> {{ number_format($product->productCard->price, 2, ',', ' ') }} ₽</p>
            <p><strong>Описание:</strong> {{ $product->productCard->description ?? 'Нет описания' }}</p>

            <p><strong>Размер:</strong> {{ $product->size->manufacturer_size ?? '-' }}</p>
            <p><strong>Цвет:</strong> {{ $product->color->title ?? '-' }}</p>
            <p><strong>Количество в наличии:</strong> {{ $product->quantity }}</p>

            <!-- Галерея изображений -->
            <h4>Фото товара</h4>
            <div class="row">
                @forelse($product->photos as $photo)
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $photo->image_path) }}" class="img-thumbnail" alt="Фото товара">
                    </div>
                @empty
                    <p>Нет фотографий</p>
                @endforelse
            </div>

            <!-- Блок с вариациями -->
            <h4>Другие вариации</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Размер</th>
                    <th>Цвет</th>
                    <th>Количество</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($similarProducts as $similar)
                    <tr>
                        <td>{{ $similar->size->title ?? '-' }}</td>
                        <td>{{ $similar->color->title ?? '-' }}</td>
                        <td>{{ $similar->quantity }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $similar) }}" class="btn btn-info btn-sm" title="Просмотр">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Нет других вариаций</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Назад
            </a>
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Редактировать
            </a>
        </div>
    </div>
@stop
