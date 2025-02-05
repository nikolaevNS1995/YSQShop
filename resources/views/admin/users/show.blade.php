@extends('adminlte::page')

@section('title', 'Пользователь - ' . $user->first_name)

@section('content_header')
    <h1>Информация о пользователе: {{ $user->first_name }} {{ $user->last_name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Телефон:</strong> {{ $user->phone ?? 'Не указан' }}</p>
            <p><strong>Роль:</strong>
                @if($user->isAdmin())
                    <span class="badge badge-danger">Администратор</span>
                @else
                    <span class="badge badge-primary">Пользователь</span>
                @endif
            </p>
            <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
        </div>
    </div>

    <hr>

    <h4>Дополнительные действия:</h4>
    <div class="btn-group">
        <a href="{{ route('admin.favorites.show', $user->favorites) }}" class="btn btn-warning">
            <i class="fas fa-star"></i> Избранное
        </a>
        <a href="{{ route('admin.carts.show', $user->cart) }}" class="btn btn-info">
            <i class="fas fa-shopping-cart"></i> Корзина
        </a>
        <a href="{{ route('admin.orders.index', ['user_id' => $user->id]) }}" class="btn btn-success">
            <i class="fas fa-box"></i> Заказы
        </a>
    </div>

    <hr>

    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
        <i class="fas fa-edit"></i> Редактировать
    </a>

    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Удалить пользователя?')">
            <i class="fas fa-trash"></i> Удалить
        </button>
    </form>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Назад</a>
@stop
