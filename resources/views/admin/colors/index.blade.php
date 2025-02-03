@extends('adminlte::page')

@section('title', 'Цвета')

@section('content_header')
    <h1>Цвета</h1>
@stop

@section('content')
    <a href="{{ route('admin.colors.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить цвет
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($colors as $color)
            <tr>
                <td>{{ $color->id }}</td>
                <td>{{ $color->title }}</td>
                <td>
                    <a href="{{ route('admin.colors.edit', $color) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.colors.destroy', $color) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить цвет?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $colors->links('vendor.pagination.bootstrap-5') }}
@stop
