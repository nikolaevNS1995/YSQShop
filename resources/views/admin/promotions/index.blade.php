@extends('adminlte::page')

@section('title', 'Список акций')

@section('content_header')
    <h1>Список акций</h1>
@stop

@section('content')
    <a href="{{ route('admin.promotions.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить акцию
    </a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Скидка</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
            <tr>
                <td>{{ $promotion->id }}</td>
                <td>{{ $promotion->title }}</td>
                <td>{{ $promotion->discount_value }} {{ $promotion->discount_unit }}</td>
                <td>
                    <a href="{{ route('admin.promotions.show', $promotion) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Просмотр
                    </a>
                    <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Редактировать
                    </a>
                    <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $promotions->links('vendor.pagination.bootstrap-5') }}
@stop
