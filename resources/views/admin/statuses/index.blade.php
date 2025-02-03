@extends('adminlte::page')

@section('title', 'Статусы')

@section('content_header')
    <h1>Статусы</h1>
@stop

@section('content')
    <a href="{{ route('admin.statuses.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить статус
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
        @foreach($statuses as $status)
            <tr>
                <td>{{ $status->id }}</td>
                <td>{{ $status->title }}</td>
                <td>
                    <a href="{{ route('admin.statuses.edit', $status) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.statuses.destroy', $status) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить статус?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $statuses->links('vendor.pagination.bootstrap-5') }}
@stop
