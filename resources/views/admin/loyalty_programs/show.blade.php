@extends('adminlte::page')

@section('title', 'Программа лояльности - ' . $loyaltyProgram->user->email)

@section('content_header')
    <h1>Программа лояльности для {{ $loyaltyProgram->user->email }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Пользователь:</strong> {{ $loyaltyProgram->user->email }}</p>
            <p><strong>Текущий баланс бонусов:</strong> {{ $loyaltyProgram->bonus_points }} баллов</p>

            <h4>История начислений:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Заказ</th>
                    <th>Количество бонусов</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($loyaltyProgram->orders as $bonus)

                        <tr>
                            <td>{{ $bonus->created_at->format('d.m.Y H:i') }}</td>
                            <td><a href="{{ route('admin.orders.show', $bonus->id) }}">Заказ #{{ $bonus->id }}</a></td>
                            <td>+{{ $bonus->pivot->used_bonus_points }} баллов</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <a href="{{ route('admin.loyalty-programs.index') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
@stop
