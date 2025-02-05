@extends('adminlte::page')

@section('title', 'Список пользователей')

@section('content_header')
    <h1>Список пользователей</h1>
@stop

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить пользователя
    </a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    @if($user->isAdmin())
                        <span class="badge badge-danger">Администратор</span>
                    @else
                        <span class="badge badge-primary">Пользователь</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить пользователя?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links('vendor.pagination.bootstrap-5') }}
@stop
