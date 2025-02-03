@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="input-group mb-3">

            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="Email" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="input-group mb-3">

            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary btn-block">Войти</button>
    </form>
@stop
