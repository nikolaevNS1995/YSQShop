@extends('adminlte::page')

@section('title', 'Программы лояльности')

@section('content_header')
    <h1>Программы лояльности</h1>
@stop

@section('content')
    <a href="{{ route('admin.loyalty-programs.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить участника
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Пользователь</th>
            <th>Бонусы</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loyaltyPrograms as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->user->email }}</td>
                <td>{{ $program->bonus_points }}</td>
                <td>
                    <a href="{{ route('admin.loyalty-programs.show', $program) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.loyalty-programs.edit', $program) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.loyalty-programs.destroy', $program) }}" method="POST" style="display:inline-block;">
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

    {{ $loyaltyPrograms->links('vendor.pagination.bootstrap-5') }}
@stop
