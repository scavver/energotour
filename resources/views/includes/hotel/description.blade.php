<div class="row bordered-bottom">
    {{-- Левая часть --}}
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 bordered-right">
        {{-- Слайдер --}}
        @if (!empty($slides))
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left: -16px; margin-right: -15px">
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
                <span class="text-danger">Не удалось загрузить коллекцию изображений слайдера<br>views.public.hotels.single | app/Http/Controllers/HotelController</span>
            </div>
        @endif
    </div>

    {{-- Правая часть --}}
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
        {{-- Первый ряд --}}
        <div class="row p-3">
            <div class="card border-0 w-100" style="box-shadow: 0 0.2rem .5rem rgba(0, 0, 0, 0.1) !important">
                <div class="card-body p-0 text-center">
                    {{-- Цена от, скидка до --}}
                    <div class="single price-discount m-3">@if(!empty($hotel->price) && !empty($hotel->discount))
                        от
                        <span class="price px-1">
                            <s class="pr-1">{{ $hotel->price['min_price'] }}</s>
                            <strong>{{ intval($hotel->price['min_price'] - ($hotel->price['min_price'] * ($hotel->discount['max_discount'] / 100))) }} руб.</strong>
                        </span>

                        @if(!empty($hotel->discount))
                        <span class="discount">
                            -{{ $hotel->discount['max_discount'] }}%
                        </span>
                        @endif
                        @else Чтобы уточнить стоимость пожалуйста свяжитесь с нашим менеджером. @endif</div>

                    @if(!empty($hotel->price))
                    {{-- Официальные цены --}}
                    <button type="button" class="btn btn-outline-primary-dark btn-block my-0 hotel-card-button" style="text-align: left !important; padding-left: 1rem;" data-toggle="modal" data-target="#priceModal">
                        <i class="fas fa-money-check-alt mr-2 fa-fw"></i> Прайс-лист
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
                                    @if(!empty($hotel->price->image))
                                        <a href="{{ asset($hotel->price->image['path']) }}" title="Открыть оригинал" target="_blank"><img src="{{ asset($hotel->price->image['path']) }}" width="100%" alt="Цены {{ $hotel->title }}"></a>
                                    @elseif(!empty($hotel->price->document))
                                        <a href="{{ asset($hotel->price->document['path']) }}" class="btn btn-primary btn-lg btn-block" target="_blank">
                                            <i class="fas fa-file-pdf fa-fw pr-2"></i> Открыть .PDF
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Наши скидки --}}
                    @if(!empty($hotel->discount))
                    <button type="button" class="btn btn-outline-primary-dark btn-block my-0 hotel-card-button" style="text-align: left !important; padding-left: 1rem;" data-toggle="modal" data-target="#discountModal">
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
                                    {!! $hotel->discount->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Онлайн бронирование --}}
                    <a class="btn btn-outline-primary-dark btn-block my-0 hotel-card-button" style="text-align: left !important; padding-left: 1rem;" href="{{ url('booking') }}" target="_blank">
                        <i class="fas fa-calendar-check mr-2 fa-fw"></i> Онлайн бронирование
                    </a>

                    {{-- Показать на карте --}}
                    <button type="button" class="btn btn-outline-primary-dark btn-block my-0 hotel-card-button-last" style="text-align: left !important; padding-left: 1rem; border-radius: .45rem" data-toggle="modal" data-target="#mapModal">
                        <i class="fas fa-drafting-compass mr-2 fa-fw"></i> Показать на карте
                    </button>

                    {{-- Модальное окно с картой --}}
                    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mapModalLabel">{{ $hotel->title }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="padding: 0px !important; overflow: hidden; border-bottom-left-radius: .5rem; border-bottom-right-radius: .5rem;">
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
                @foreach($hotel->properties as $property)
                    <a href="{{ url("hotels?selectedCategory=&selectedType=&checkedProperties=" . $property->id) }}" target="_blank" class="single-tags">#{{ $property->title }}</a>
                @endforeach
            </div>
        </div>

    </div>
</div>



{{-- Описание --}}
@if(!empty($hotel->about->description))
<div class="row pt-3">
    <div class="col">
        <h4>Описание</h4>
        {!! $hotel->about->description !!}
    </div>
</div>
@endif

{{-- Правила заселения --}}
@if(!empty($hotel->about->rules_of_settlement))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Правила заселения</h4>
            <p class="content">{{ $hotel->about->rules_of_settlement }}</p>
        </div>
    </div>
@endif

{{-- Дети --}}
@if(!empty($hotel->about->children))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Дети</h4>
            <p class="content">{{ $hotel->about->children }}</p>
        </div>
    </div>
@endif

{{-- Услуги включенные в стоимость --}}
@if(!empty($hotel->about->included_services))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Услуги включенные в стоимость</h4>
            <p class="content">{{ $hotel->about->included_services }}</p>
        </div>
    </div>
@endif

{{-- Адрес --}}
@if(!empty($hotel->about->address))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Адрес</h4>
            <p class="content">{{ $hotel->about->address }}</p>
        </div>
    </div>
@endif

{{-- Территория --}}
@if(!empty($hotel->about->territory))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Территория</h4>
            <p class="content">{{ $hotel->about->territory }}</p>
        </div>
    </div>
@endif

{{-- Реконструкция --}}
@if(!empty($hotel->about->reconstruction))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Реконструкция</h4>
            <p class="content">{{ $hotel->about->reconstruction }}</p>
        </div>
    </div>
@endif