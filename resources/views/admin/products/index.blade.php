@extends('adminlte::page')

@section('title', 'Список товаров')

@section('content_header')
    <h1>Список товаров</h1>
@stop

@section('content')
    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить товар
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Размер</th>
            <th>Цвет</th>
            <th>Количество</th>
            <th>Теги</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productCard->title }}</td>
                <td>{{ $product->productCard->category->title ?? 'Без категории' }}</td>
                <td>{{ $product->productCard->price }} ₽</td>
                <td>{{ $product->size->manufacturer_size ?? '-' }}</td>
                <td>{{ $product->color->title ?? '-' }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    @foreach($product->tags as $tag)
                        <span class="badge badge-primary">{{ $tag->title }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm" title="Просмотр">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm" title="Редактировать">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Удалить" onclick="return confirm('Удалить этот товар?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links('vendor.pagination.bootstrap-5') }}
@stop
