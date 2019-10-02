<div class="row bordered-bottom">
    {{-- Левая часть --}}
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 bordered-right">
        {{-- Слайдер --}}
        @if (count($slides) > 0)
            <div id="carouselExampleIndicators" class="carousel slide my-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i = 0; $i < count($slides); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="
                            @if($i == 0)
                                active
                            @endif">
                        </li>
                    @endfor
                </ol>
                <div class="carousel-inner rounded">
                    @foreach($slides as $slide)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img class="d-block w-100 h-100" src="{{ asset($slide->path) }}" class="card-img" alt="{{ $slide->alt }}">
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
                <span class="text-danger">Не удалось загрузить коллекцию изображений слайдера<br>views.public.places.single | app/Http/Controllers/PlaceController</span>
            </div>
        @endif
    </div>

    {{-- Правая часть --}}
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
        {{-- Первый ряд --}}
        <div class="row p-3">
            <div class="card w-100">
                <div class="card-body p-0 text-center">
                    {{-- Цена от, скидка до --}}
                    <div class="single price-discount m-3">
                        от
                        <span class="price px-1">
                            <s class="pr-1">{{ $place->price->min_price }}</s>
                            <strong>{{ intval($place->price->min_price - ($place->price->min_price * ($place->discount->max_discount / 100))) }} руб.</strong>
                        </span>

                        @if(!empty($place->discount))
                        <span class="discount">
                            -{{ $place->discount->max_discount }}%
                        </span>
                        @endif
                    </div>

                    @if(!empty($place->price))
                    {{-- Официальные цены --}}
                    <button type="button" class="btn btn-outline-primary btn-block my-0 place-card-button" style="text-align: left !important; padding-left: 1rem;" data-toggle="modal" data-target="#priceModal">
                        <i class="fas fa-money-check-alt mr-2 fa-fw"></i> Официальные цены
                    </button>

                    {{-- Модальное окно с прайс-листом --}}
                    <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="priceModalLabel">Прайс-лист</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ asset($place->price->image->path) }}" title="Открыть оригинал" target="_blank"><img src="{{ asset($place->price->image->path) }}" width="100%" alt="Цены {{ $place->title }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Наши скидки --}}
                    @if(!empty($place->discount))
                    <button type="button" class="btn btn-outline-primary btn-block my-0 place-card-button" style="text-align: left !important; padding-left: 1rem;" data-toggle="modal" data-target="#discountModal">
                        <i class="fas fa-percentage mr-2 fa-fw"></i> Наши скидки
                    </button>

                    {{-- Модальное окно со скидками --}}
                    <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="discountModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="discountModalLabel">Наши скидки</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $place->discount->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Онлайн бронирование --}}
                    <a class="btn btn-outline-primary btn-block my-0 place-card-button" style="text-align: left !important; padding-left: 1rem;" href="{{ url('booking') }}" target="_blank">
                        <i class="fas fa-calendar-check mr-2 fa-fw"></i> Онлайн бронирование
                    </a>

                    {{-- Показать на карте --}}
                    <button type="button" class="btn btn-outline-primary btn-block my-0 place-card-button-last" style="text-align: left !important; padding-left: 1rem;" data-toggle="modal" data-target="#mapModal">
                        <i class="fas fa-drafting-compass mr-2 fa-fw"></i> Показать на карте
                    </button>

                    {{-- Модальное окно с картой --}}
                    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mapModalLabel">{{ $place->title }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <accommodation-location></accommodation-location>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Второй ряд --}}
        <div class="row px-3 pb-3 pt-0">
            <h5>Услуги и удобства в отеле</h5>

            <div class="single-tags">
                @foreach($place->properties as $property)
                    <a href="{{ url("places?selectedCategory=&selectedType=&checkedProperties=" . $property->id) }}" target="_blank" class="single-tags">#{{ $property->title }}</a>
                @endforeach
            </div>
        </div>

    </div>
</div>



{{-- Описание --}}
@if(!empty($place->about->description))
<div class="row pt-3">
    <div class="col">
        <h4>Описание</h4>
        {!! $place->about->description !!}
    </div>
</div>
@endif

{{-- Правила заселения --}}
@if(!empty($place->about->rules_of_settlement))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Правила заселения</h4>
            <p class="content">{{ $place->about->rules_of_settlement }}</p>
        </div>
    </div>
@endif

{{-- Дети --}}
@if(!empty($place->about->children))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Дети</h4>
            <p class="content">{{ $place->about->children }}</p>
        </div>
    </div>
@endif

{{-- Услуги включенные в стоимость --}}
@if(!empty($place->about->included_services))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Услуги включенные в стоимость</h4>
            <p class="content">{{ $place->about->included_services }}</p>
        </div>
    </div>
@endif

{{-- Адрес --}}
@if(!empty($place->about->address))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Адрес</h4>
            <p class="content">{{ $place->about->address }}</p>
        </div>
    </div>
@endif

{{-- Территория --}}
@if(!empty($place->about->territory))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Территория</h4>
            <p class="content">{{ $place->about->territory }}</p>
        </div>
    </div>
@endif

{{-- Реконструкция --}}
@if(!empty($place->about->reconstruction))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Реконструкция</h4>
            <p class="content">{{ $place->about->reconstruction }}</p>
        </div>
    </div>
@endif