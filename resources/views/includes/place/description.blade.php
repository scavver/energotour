<!-- Slider, Price, Discount, Properties (First Row) -->
<div class="row">
    <!-- Slider -->
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8">
        @if (count($slides) > 0)
            <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
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
        <div class="row pr-3 pl-3 pl-sm-3 pl-md-0">
            <div class="card-group w-100">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">до -{{ $place->discount->max_discount }}%</h5>
                        <p class="card-text"><small class="text-muted">Частным лицам</small></p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">от {{ $place->price->min_price }} руб.</h5>
                        <p class="card-text"><small class="text-muted">По прайсу</small></p>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-block mb-3" data-toggle="modal" data-target="#exampleModal">
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
        <div class="row pt-0 pb-3 pr-3 pl-3 pl-sm-3 pl-md-0">
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
<div class="row">
    <div class="col">
        <h4>Описание</h4>
        {!! $place->content !!}
    </div>
</div>