@extends('adminlte::page')

@section('title', 'Размеры')

@section('content_header')
    <h1>Размеры</h1>
@stop

@section('content')
    <a href="{{ route('admin.sizes.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Добавить размер
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
            <th>Тип</th>
            <th>Размер производителя</th>
            <th>Российский размер</th>
            <th>Обхват груди</th>
            <th>Обхват бедер</th>
            <th>Обхват талии</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sizes as $size)
            <tr>
                <td>{{ $size->id }}</td>
                <td>{{ $size->type }}</td>
                <td>{{ $size->manufacturer_size }}</td>
                <td>{{ $size->russian_size }}</td>
                <td>{{ $size->bust_circumference ?? '-' }}</td>
                <td>{{ $size->hip_circumference ?? '-' }}</td>
                <td>{{ $size->waist_circumference ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.sizes.edit', $size) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.sizes.destroy', $size) }}" method="POST" style="display:inline-block;">
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

    {{ $sizes->links('vendor.pagination.bootstrap-5') }}
@stop
