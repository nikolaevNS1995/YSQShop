@extends('adminlte::page')

@section('title', 'Список корзин')

@section('content_header')
    <h1>Список корзин</h1>
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
        @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->user->email }}</td>
                <td>
                    <a href="{{ route('admin.carts.show', $cart) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Просмотр
                    </a>
                    <form action="{{ route('admin.carts.destroy', $cart) }}" method="POST" style="display:inline-block;">
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

    {{ $carts->links('vendor.pagination.bootstrap-5') }}
@stop
