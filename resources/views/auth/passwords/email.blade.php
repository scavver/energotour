@extends('layouts.app')

@section('title')
Сброс пароля
@endsection

@section('content')
<main class="container-fluid py-6 py-md-7">
    <div class="container">

        @if (session('status'))
            <div class="text-center text-success pb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <div class="col-md-4 offset-md-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail Адрес" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 offset-md-3 text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Запросить ссылку на сброс пароля') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
