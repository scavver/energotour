@extends('layouts.app-no-callback')

@section('title')
Авторизация
@endsection

@section('content')
<main class="container-fluid pt-4 pb-5 pt-md-6 pb-md-7">
    <div class="container">
        <h2 class="text-center pb-3"><i class="fas fa-fingerprint pr-3"></i>Авторизация</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <div class="col-md-4 offset-md-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail Адрес" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 offset-md-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-4 offset-md-4 text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Войти') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Восстановить доступ') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4 offset-md-4 text-center">
                    <div class="form-check">
                        <div class="custom-control custom-checkbox pt-3" style="opacity: 0.5">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">{{ __('Запомнить меня') }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
