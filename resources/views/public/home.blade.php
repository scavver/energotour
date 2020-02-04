@extends('layouts.app')

@section('title')
Скидки на отдых в Крыму
@endsection

@section('description')
Выгодные предложения, горящие туры на официальном сайте туроператора Энерго-Тур.
@endsection

@section('content')
     <div class="container-fluid bg-primary-dark-color px-0">
            
                {{-- Слайдер --}}
                @if (!empty($slides))
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < count($slides); $i++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="
                                @if($i == 0)
                                    active
                                @endif">
                            </li>
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        @foreach($slides as $slide)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img class="d-block" src="{{ asset($slide->path) }}" class="card-img" alt="{{ $slide->alt }}" style="height: 65vh; width: 100%; object-fit: cover">
                                @if(!empty($slide->alt))
                                <div class="carousel-caption d-none d-md-block">
                                  {{--<h5>First slide label</h5>--}}
                                  <p style="background: #0000007a; border-radius: 4px; width: max-content; padding-left: 10px; padding-right: 10px; margin: auto;">{{ $slide->alt }}</p>
                                </div>
                                @endif
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
                    <span class="text-danger">Не удалось загрузить коллекцию изображений слайдера<br>views.public.hotels.single | app/Http/Controllers/HotelController</span>
                </div>
            @endif

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
                        <a href="{{ route('hotels', ['r' => $region->id, 't' => '', 'p' => '']) }}">
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

    @if (count($popular) > 0)
    <div class="container special-offers">
        <div class="row px-3 py-4 header">
            <h2 class="w-100">Лучшие предложения</h2>
            <a href="{{ route('hotels', ['r' => '', 't' => '', 'p' => 1]) }}">Показать все <i class="fas fa-angle-right"></i></a>
        </div>

        <div class="row">
            @foreach($popular as $hotel)
            <div class="col-12 col-sm-12 col-md-4">
                <a href="{{ url('hotels/' . $hotel->slug) }}">
                    <div class="hotel-container">
                        <img src="{{ $hotel->image->path }}" class="image-container" alt="{{ $hotel->name }}">
                        <div class="content-container text-center">
                            <div class="hotel-name">{{ $hotel->name }}</div>
                            <div class="region-type">{{ $hotel->region->name }} | {{ $hotel->type->name }}</div>
                            @if(!empty($hotel->price))<div class="price-discount"><s class="pr-1">{{ $hotel->price->min_price }}</s> {{ intval($hotel->price->min_price - ($hotel->price->min_price * ($hotel->discount->max_discount / 100))) }} руб. <span class="pl-3">-{{ $hotel->discount->max_discount }}%</span></div>@endif
                            <div class="region-type mb-0">с чел. в сутки</div>
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
                 <a href="{{ route('hotels', ['r' => '', 't' => 1, 'p' => '']) }}">
                     <div class="hotel-container">
                         <img src="{{ $hotel->where('id', 17)->first()->image->path }}" class="image-container" alt="Санатории Крыма">
                         <div class="content-container text-center">
                             <div class="hotel-name">Санатории</div>
                             <div class="region-type">{{ count($sanatorium) }} Предложений</div>
                         </div>
                     </div>
                 </a>
             </div>

             <div class="col-12 col-sm-12 col-md-4">
                 <a href="{{ route('hotels', ['r' => '', 't' => 1, 'p' => 7]) }}">
                     <div class="hotel-container">
                         <img src="{{ $hotel->where('id', 13)->first()->image->path }}" class="image-container" alt="Отдых с детьми в Крыму">
                         <div class="content-container text-center">
                             <div class="hotel-name">Отдых с детьми</div>
                             <div class="region-type">{{ count($family) }} Предложений</div>
                         </div>
                     </div>
                 </a>
             </div>

             <div class="col-12 col-sm-12 col-md-4">
                 <a href="{{ route('hotels', ['r' => '', 't' => '', 'p' => 2]) }}">
                     <div class="hotel-container">
                         <img src="{{ $hotel->where('id', 8)->first()->image->path }}" class="image-container" alt="Санатории и отели с бассейном в Крыму">
                         <div class="content-container text-center">
                             <div class="hotel-name">С бассейном</div>
                             <div class="region-type">{{ count($pool) }} Предложений</div>
                         </div>
                     </div>
                 </a>
             </div>
         </div>
     </div>

     <div class="container-fluid bg-white">
         <div class="container p-3 text-center">
             <p id="about" class="mb-0" style="font-family: Ubuntu,sans-serif; opacity: .85">
                Менеджеры нашей компании с удовольствием
                помогут Вам выбрать отель или санаторий в Крыму,
                который максимально оправдает Ваши ожидания от
                долгожданного отдыха. ООО «ТК «Энерго-Тур»
                работает с отелями и санаториями Ялты, Алушты,
                Евпатории и других городов Крыма с 2004 года. За
                это время мы посетили каждый из отелей, которые
                Вам предлагаем и, зная все их особенности, можем
                помочь с оптимальным выбором места Вашего
                будущего отдыха!
             </p>
             {{--<h4 class="mb-0 text-eclipse">Отели на карте</h4>--}}
         </div>
     </div>

    <accommodation-markers></accommodation-markers>

@endsection