<!-- Slider, Price, Discount, Properties (First Row) -->
<div class="row bordered-bottom">
    <!-- Slider -->
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 bordered-right">
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

    <!-- Price, Discount -->
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
        <div class="row p-3">
            <!-- Price & Discount -->
            <div class="card w-100 mb-3">
                <div class="card-body text-center">
                    <div class="single price-discount">
                        от
                        <span class="price px-1">
                            <s class="pr-1">{{ $place->price->min_price }}</s>
                            <strong>{{ intval($place->price->min_price - ($place->price->min_price * ($place->discount->max_discount / 100))) }} руб.</strong>
                        </span>

                        <span class="discount">
                            -{{ $place->discount->max_discount }}%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Booking button link -->
            <a class="btn btn-outline-success btn-block mb-3 mt-0" href="{{ url('booking') }}">
                <i class="fas fa-calendar-check mr-2 fa-fw"></i> Онлайн бронирование
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-block my-0" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-drafting-compass mr-2 fa-fw"></i> Показать на карте
            </button>
        </div>

        <!-- Location Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $place->title }}</h5>
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

        <!-- Properties -->
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

<!-- Content (Second Row) -->
@if(!empty($place->about->description))
<div class="row pt-3">
    <div class="col">
        <h4>Описание</h4>
        {!! $place->about->description !!}
    </div>
</div>
@endif

<!-- Content (Third Row) -->
@if(!empty($place->about->rules_of_settlement))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Правила заселения</h4>
            <p class="content">{{ $place->about->rules_of_settlement }}</p>
        </div>
    </div>
@endif

<!-- Content (Fourth Row) -->
@if(!empty($place->about->included_services))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Условия включенные в стоимость</h4>
            <p class="content">{{ $place->about->included_services }}</p>
        </div>
    </div>
@endif

<!-- Content (Fifth Row) -->
@if(!empty($place->about->address))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Адрес</h4>
            <p class="content">{{ $place->about->address }}</p>
        </div>
    </div>
@endif

<!-- Content (Sixth Row) -->
@if(!empty($place->about->territory))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Территория</h4>
            <p class="content">{{ $place->about->territory }}</p>
        </div>
    </div>
@endif

<!-- Content (Seventh Row) -->
@if(!empty($place->about->reconstruction))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Реконструкция</h4>
            <p class="content">{{ $place->about->reconstruction }}</p>
        </div>
    </div>
@endif

<!-- Content (Second Row) -->
@if(!empty($place->about->children))
    <div class="row pt-3 bordered-top">
        <div class="col">
            <h4>Дети</h4>
            <p class="content">{{ $place->about->children }}</p>
        </div>
    </div>
@endif