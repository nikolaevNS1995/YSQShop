@extends('adminlte::page')

@section('title', 'Просмотр категории')

@section('content_header')
    <h1>Просмотр категории</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>{{ $category->title }}</h3>
            <!-- Вывод подкатегорий -->
            @if($category->children->isNotEmpty())
                <h4>Подкатегории:</h4>
                <ul>
                    @foreach($category->children as $child)
                        <li>
                            <a href="{{ route('admin.categories.show', $child) }}">{{ $child->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p><strong>Подкатегории:</strong> <span class="text-muted">Нет подкатегорий</span></p>
            @endif

            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Назад
            </a>
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Редактировать
            </a>
        </div>
    </div>
@stop
