@extends('layouts.app')

@section('title')
Путевки в Крым
@endsection

@section('description')
Выгодные предложения, горящие туры на официальном сайте туроператора Энерго-Тур.
@endsection

@section('content')
     <div class="container-fluid pt-md-4 px-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 px-0 mb-3 mb-md-0 d-flex align-items-center">
                        <iframe src="https://samo.energotour.com/fast_search" frameborder="0" height="387px" width="100%" scrolling="no"></iframe>
                        {{-- <div class="card border-0 shadow-sm h-100" id="fast-search">
                            <div class="card-body pt-0">
                                <h5 class="card-title my-3">Онлайн бронирование</h5>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option value="" disabled selected>Направление</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option value="" disabled selected>Место размещения</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option value="" disabled selected>Дата заезда</option>
                                    </select>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control form-control" placeholder="Цена до">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control form-control" placeholder="Ночей">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col">
                                        <input type="text" class="form-control form-control" placeholder="Взрослых">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control form-control" placeholder="Детей">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary text-white btn btn-block">Найти</button>
                            </div>
                        </div>--}}

                    </div>

                    <div class="col-12 col-sm-12 col-md-8 col-xl-8 pr-md-0 d-flex align-items-center">
                        @if (count($carouselImages) > 0)
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner shadow-sm" style="border-radius: .5rem">
                                    @foreach($carouselImages as $carouselImage)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <img class="d-block w-100 h-100" src="{{ $carouselImage->path }}" class="card-img" alt="{{ $carouselImage->alt }}">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @else
                            <div class="d-flex justify-content-center text-center m-3">
                                <span class="text-danger">Не удалось загрузить коллекцию изображений слайдера<br>views.public.home | app/Http/Controllers/PageController</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
     </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row pt-3 pb-4">
                <div class="col text-center">
                    <p id="about" class="mb-0">ООО «Туристическая компания Энерго-Тур» является оптовым покупателем услуг объектов размещения в Крыму. Мы работаем в сфере туризма с 2004 г. Приобретая квоты мест, наша компания гарантирует получение заказанных услуг в полном объеме.
                        Наша специализация - это
                        отдых и лечение в лучших отелях, пансионатах и санаториях Крыма;
                        обслуживание семинаров и конференций;
                        организация индивидуальных и групповых трансферов.</p>
                </div>
            </div>
        </div>
    </div>

    @if (count($regions) > 0)
    <div class="container-fluid bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center py-4">
                    <h1 class="text-eclipse">Популярные направления</h1>
                </div>
            </div>

            <div class="row pb-md-5">
                @foreach($regions as $region)
                    <div class="col-12 col-sm-12 col-md-3 mb-3 mb-sm-3 mb-md-0">
                        <a href="{{ route('places', ['r' => $region->id, 't' => '', 'p' => '']) }}">
                            <div class="card border-0">
                                <img src="{{ $region->image->path }}" class="cat card-img" alt="{{ $region->name }}">

                                <div class="cat card-img-overlay bg d-flex justify-content-center">
                                    <h4 class="card-title cat align-self-center">{{ $region->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
        <div class="d-flex justify-content-center text-center m-3">
            <span class="text-danger">Не удалось загрузить коллекцию категорий<br>views.public.home | app/Http/Controllers/PageController</span>
        </div>
    @endif

    @if (count($hot) > 0)
    <div class="container special-offers">
        <div class="row px-3 py-4 header">
            <h2 class="w-100">Лучшие предложения</h2>
            <a href="{{ route('places', ['r' => '', 't' => '', 'p' => 1]) }}">Показать все <i class="fas fa-angle-right"></i></a>
        </div>

        <div class="row">
            @foreach($hot as $place)
            <div class="col-12 col-sm-12 col-md-4">
                <a href="{{ url('places/' . $place->slug) }}">
                    <div class="place-container">
                        <img src="{{ $place->image->path }}" class="image-container" alt="{{ $place->name }}">
                        <div class="content-container text-center">
                            <div class="place-name">{{ $place->name }}</div>
                            <div class="region-type">{{ $place->region->name }} | {{ $place->type->name }}</div>
                            <div class="price-discount"><s class="pr-1">{{ $place->price->min_price }}</s> {{ intval($place->price->min_price - ($place->price->min_price * ($place->discount->max_discount / 100))) }} руб. <span class="pl-3">-{{ $place->discount->max_discount }}%</span></div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @else
        <div class="d-flex justify-content-center text-center m-3">
            <span class="text-danger">Не удалось загрузить коллекцию специальных предложений<br>views.public.home | app/Http/Controllers/PageController</span>
        </div>
    @endif

     <!-- And I got a swimming pool full of liquor and they dive in lyrics -->

     <div class="container special-offers">
         <div class="row px-3 pb-4 header">
             <h2 class="w-100">Популярные категории</h2>
         </div>

         <div class="row">
             <div class="col-12 col-sm-12 col-md-4">
                 <a href="{{ route('places', ['r' => '', 't' => 1, 'p' => '']) }}">
                     <div class="place-container">
                         <img src="{{ $place->where('id', 17)->first()->image->path }}" class="image-container" alt="Санатории Крыма">
                         <div class="content-container text-center">
                             <div class="place-name">Санатории</div>
                             <div class="region-type">{{ count($sanatorium) }} Предложений</div>
                         </div>
                     </div>
                 </a>
             </div>

             <div class="col-12 col-sm-12 col-md-4">
                 <a href="{{ route('places', ['r' => '', 't' => 1, 'p' => 7]) }}">
                     <div class="place-container">
                         <img src="{{ $place->where('id', 13)->first()->image->path }}" class="image-container" alt="Отдых с детьми в Крыму">
                         <div class="content-container text-center">
                             <div class="place-name">Отдых с детьми</div>
                             <div class="region-type">{{ count($family) }} Предложений</div>
                         </div>
                     </div>
                 </a>
             </div>

             <div class="col-12 col-sm-12 col-md-4">
                 <a href="{{ route('places', ['r' => '', 't' => '', 'p' => 2]) }}">
                     <div class="place-container">
                         <img src="{{ $place->where('id', 8)->first()->image->path }}" class="image-container" alt="Санатории и отели с бассейном в Крыму">
                         <div class="content-container text-center">
                             <div class="place-name">С бассейном</div>
                             <div class="region-type">{{ count($pool) }} Предложений</div>
                         </div>
                     </div>
                 </a>
             </div>
         </div>
     </div>

     <div class="container-fluid bg-white">
         <div class="container p-3 text-center">
             <h4 class="mb-0 text-eclipse">Отели на карте</h4>
         </div>
     </div>

    <accommodation-markers></accommodation-markers>

@endsection