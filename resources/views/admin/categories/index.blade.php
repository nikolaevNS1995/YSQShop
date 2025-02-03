@extends('adminlte::page')

@section('title', 'Категории')

@section('content_header')
    <h1>Категории</h1>
@stop

@section('content')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить категорию
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Подкатегории</th>
            <th>Количество товаров</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    @if($category->children->isNotEmpty())
                        <ul class="list-unstyled mb-0">
                            @foreach($category->children as $child)
                                <li>
                                    <a href="{{ route('admin.categories.show', $child) }}">{{ $child->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="text-muted">Нет подкатегорий</span>
                    @endif
                </td>
                <td>{{ $category->product_count }}</td>
                <td>
                    <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить категорию?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories->links('vendor.pagination.bootstrap-5') }}
@stop
