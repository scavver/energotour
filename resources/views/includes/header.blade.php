<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-primary navbar-dark text-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="far fa-compass pr-1"></i> {{ config('app.name', 'Laravel') }}
        </a>
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
                <li class="nav-item {{ (request()->is('places') || request()->is('places/*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('places') }}">Санатории и отели</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="">Онлайн бронирование</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="">Авиабилеты</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Трансфер
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="">Автобусом в Крым</a>
                        <a class="dropdown-item" href="#">Трансфер по Крыму</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="">Агентствам</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/o/tourists') }}">Туристам</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="tel:88001001094">
                        <i class="fas fa-headset mr-1"></i> 8 800 100 10 94
{{--                        <span class="nav-phone-number"><i class="fas fa-headset mr-1"></i> 8 800 100 10 94</span>--}}
{{--                        <span class="nav-phone-text text-right d-none d-md-block">звонок бесплатный</span>--}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>