@extends('adminlte::page')

@section('title', 'Промокоды')

@section('content_header')
    <h1>Промокоды</h1>
@stop

@section('content')
    <a href="{{ route('admin.promocodes.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить промокод
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Код</th>
            <th>Скидка</th>
            <th>Дата начала</th>
            <th>Дата окончания</th>
            <th>Лимит</th>
            <th>Использовано</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promoCodes as $promocode)
            <tr>
                <td>{{ $promocode->id }}</td>
                <td>{{ $promocode->code }}</td>
                <td>{{ $promocode->discount_value }}{{ $promocode->discount_unit }}</td>
                <td>
                    {{ $promocode->start_date ? \Carbon\Carbon::parse($promocode->start_date)->format('d.m.Y') : '—' }}
                </td>
                <td>
                    {{ $promocode->end_date ? \Carbon\Carbon::parse($promocode->end_date)->format('d.m.Y') : '—' }}
                </td>
                <td>{{ $promocode->usage_limit ?? 'Без ограничений' }}</td>
                <td>{{ $promocode->times_used }}</td>
                <td>
                    <a href="{{ route('admin.promocodes.edit', $promocode) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.promocodes.destroy', $promocode) }}" method="POST" style="display:inline-block;">
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

    {{ $promoCodes->links('vendor.pagination.bootstrap-5') }}
@stop
