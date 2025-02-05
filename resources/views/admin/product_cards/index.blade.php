@extends('adminlte::page')

@section('title', 'Карточки товаров')

@section('content_header')
    <h1>Карточки товаров</h1>
@stop

@section('content')
    <a href="{{ route('admin.product-cards.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить карточку товара
    </a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productCards as $productCard)
            <tr>
                <td>{{ $productCard->id }}</td>
                <td>{{ $productCard->title }}</td>
                <td>{{ $productCard->category->title ?? 'Без категории' }}</td>
                <td>{{ $productCard->price }} ₽</td>
                <td>
                    <a href="{{ route('admin.product-cards.show', $productCard) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.product-cards.edit', $productCard) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.product-cards.destroy', $productCard) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить карточку товара?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $productCards->links('vendor.pagination.bootstrap-5') }}
@stop
