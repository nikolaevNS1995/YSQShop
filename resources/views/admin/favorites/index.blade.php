@extends('adminlte::page')

@section('title', 'Список избранного')

@section('content_header')
    <h1>Список избранного</h1>
@stop

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Пользователь</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($favorites as $favorite)
            <tr>
                <td>{{ $favorite->id }}</td>
                <td>{{ $favorite->user->email }}</td>
                <td>
                    <a href="{{ route('admin.favorites.show', $favorite) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Просмотр
                    </a>
                    <form action="{{ route('admin.favorites.destroy', $favorite) }}" method="POST" style="display:inline-block;">
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

    {{ $favorites->links('vendor.pagination.bootstrap-5') }}
@stop
