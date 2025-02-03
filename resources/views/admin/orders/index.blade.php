@extends('adminlte::page')

@section('title', 'Заказы')

@section('content_header')
    <h1>Заказы</h1>
@stop

@section('content')
    <a href="{{ route('admin.orders.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить заказ
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Пользователь</th>
            <th>Статус</th>
            <th>Сумма</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->email ?? 'Гость' }}</td>
                <td>{{ $order->status->title ?? 'Неизвестный' }}</td>
                <td>{{ $order->total_price }} ₽</td>
                <td>{{ $order->created_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $orders->links('vendor.pagination.bootstrap-5') }}
@stop
