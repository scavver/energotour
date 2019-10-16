@extends('layouts.app')

@section('title')
Подтверждение E-Mail адреса
@endsection

@section('content')
<main class="container-fluid bg-white py-6 py-md-7">
    <div class="container text-center">
        @if (session('resent'))
            <div class="text-center text-success pb-4" role="alert">
                {{ __('На ваш электронный адрес была отправлена новая ссылка для подтверждения.') }}
            </div>
        @endif

        {{ __('Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}<br>
        {{ __('Если вы не получили письмо') }},

        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf

            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                {{ __('кликните сюда чтобы запросить новое') }}
            </button>.
        </form>

        {{-- <a href="{{ route('verification.resend') }}" id="verification">{{ __('Click here to request a verification link') }} <i class="fas fa-paper-plane"></i></a></div> --}}
    </div>
</main>
@endsection