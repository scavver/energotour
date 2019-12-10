<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary-color custom-shadow" style="border-bottom: 1px solid #4a6dab">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.svg') }}" height="45" alt="Логотип {{ config('app.name', 'Energotour') }}">
        </a>

        {{--<a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-globe-europe pr-2"></i> Энерготур
        </a>--}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- <form class="form-inline search-form">
                <input class="form-control mr-sm-2" type="search" placeholder="<i class='fas fa-search'></i>Поиск.." aria-label="Search">
            </form> -->

            <!-- Center Of Navbar -->

            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Главная</a>
                </li>
                <li class="nav-item {{ (request()->is('hotels') || request()->is('hotels/*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('hotels') }}"><i class="fas fa-hotel fa-fw mr-1"></i> Санатории и отели</a>
                </li>
                <li class="nav-item {{ request()->is('booking') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('booking') }}"><i class="fas fa-suitcase fa-fw mr-1"></i> Онлайн бронирование</a>
                </li>
                <li class="nav-item {{ request()->is('avia') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('avia') }}"><i class="fas fa-plane-departure fa-fw mr-1"></i> Авиабилеты</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="" data-toggle="modal" data-target="#transfer"><i class="fas fa-car-side fa-fw mr-1"></i> Трансфер</a>
                    {{-- Модальное окно за пределами навбара --}}
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ (request()->is('agencies') || request()->is('agencies/*')) ? 'active' : '' }}" href="/agencies/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Агентствам
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/agencies/">Договора</a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle {{ (request()->is('tourists') || request()->is('tourists/*')) ? 'active' : '' }}" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Туристам
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/tourists/how-to-booking">Как забронировать тур</a>
                        <a class="dropdown-item" href="/tourists/public-offer">Публичная оферта</a>
                        <a class="dropdown-item" href="/tourists/how-to-pay">Как оплатить</a>
                    </div>
                </li>
{{--                <li class="nav-item {{ request()->is('contacts') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>--}}
{{--                </li>--}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto navbar-tel">
                <li class="nav-item">
                    <a class="nav-link active" href="tel:88001001094">
{{--                        <i class="fas fa-headset mr-1"></i> 8 800 100 10 94--}}
                        <span class="nav-phone-number"><i class="fas fa-headset mr-1"></i> 8 800 100 10 94</span>
                        <span class="nav-phone-text text-right d-none d-md-block">звонок бесплатный</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Модальное окно трансфера --}}
@include("includes.transfer-modal")