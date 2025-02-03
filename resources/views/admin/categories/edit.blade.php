@extends('adminlte::page')

@section('title', 'Редактировать категорию')

@section('content_header')
    <h1>Редактировать категорию</h1>
@stop

@section('content')
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" value="{{ $category->title }}" required>
        </div>

        <div class="form-group">
            <label>Родительская категория</label>
            <select name="parent_id" class="form-control">
                <option value="">Нет</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@stop
