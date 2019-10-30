@extends("layouts.app")

@section("title")
    {{ $place->title }}
@endsection

@section("description")
    {{ $place->description }}
@endsection

@section("content")
<div class="container-fluid">
    <div class="row">
        {{-- Левый сайдбар --}}
        <aside class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 order-1 order-sm-1 order-md-1 px-0">
            <div class="sticky-top sticky-offset py-3 pl-3">
                {{-- Боковое меню --}}
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="text-center text-md-right nav-link nav-link-single active" id="v-pills-description-tab" data-toggle="pill" href="#v-pills-description" role="tab" aria-controls="v-pills-description" aria-selected="true">Описание</a>
                    @if(count($rooms) > 0)
                        <a class="text-center text-md-right nav-link nav-link-single" id="v-pills-rooms-tab" data-toggle="pill" href="#v-pills-rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false">Номерной фонд</a>
                    @endif
                    @if(count($infrastructure) > 0)
                        <a class="text-center text-md-right nav-link nav-link-single" id="v-pills-infrastructure-tab" data-toggle="pill" href="#v-pills-infrastructure" role="tab" aria-controls="v-pills-infrastructure" aria-selected="false">Инфраструктура</a>
                    @endif
                    @if(count($place->galleries) >= 2)
                        <a class="text-center text-md-right nav-link nav-link-single" id="v-pills-photo-tab" data-toggle="pill" href="#v-pills-photo" role="tab" aria-controls="v-pills-photo" aria-selected="false">Фотографии</a>
                    @endif
                    @if(count($treatment) > 0)
                        <a class="text-center text-md-right nav-link nav-link-single" id="v-pills-treatment-tab" data-toggle="pill" href="#v-pills-treatment" role="tab" aria-controls="v-pills-treatment" aria-selected="false">Лечение</a>
                    @endif
                    @if(count($food) > 0)
                        <a class="text-center text-md-right nav-link nav-link-single" id="v-pills-food-tab" data-toggle="pill" href="#v-pills-food" role="tab" aria-controls="v-pills-food" aria-selected="false">Питание</a>
                    @endif
                </div>

                {{-- Баннер --}}
                {{--
                <a href="{{ url('places/poltava') }}"><img src="{{ asset('images/banner.png') }}" class="img-fluid pt-3 rounded d-none d-md-block" id="banner" alt="Санаторий Полтава Крым Саки"></a>
                <p class="text-muted text-center d-none d-md-block"><i class="fab fa-hotjar fa-fw mx-1 my-2"></i> Горящее предложение</p>
                --}}
            </div>
        </aside>

        {{-- Контент --}}
        <main class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-8 order-2 order-sm-2 order-md-2 shadow-sm bg-white min-vh-100 px-0 order-0 order-sm-0 order-md-1 order-xl-1" style="margin-top: 1rem; margin-bottom: 1rem; border-top: 3px solid #e6a017; border-bottom-right-radius: .5rem; border-bottom-left-radius: .5rem">
            <h3 class="px-3 pt-3 pb-3 mb-0 bordered-bottom">{{ $place->name }}<small> / {{ $place->type->name }} / {{ $place->region->name }}</small></h3>

            <div class="tab-content" id="v-pills-tabContent">
                {{-- Описание --}}
                <div class="px-3 tab-pane fade show active" id="v-pills-description" role="tabpanel" aria-labelledby="v-pills-description-tab">
                    @include("includes.place.description")
                </div>

                {{-- Номерной фонд --}}
                @if(count($rooms) > 0)
                    <div class="px-3 tab-pane fade show" id="v-pills-rooms" role="tabpanel" aria-labelledby="v-pills-rooms-tab">
                        @include("includes.place.rooms")
                    </div>
                @endif

                {{-- Питание --}}
                @if(!empty($food))
                    <div class="px-3 tab-pane fade" id="v-pills-food" role="tabpanel" aria-labelledby="v-pills-food-tab">
                        @include("includes.place.food")
                    </div>
                @endif

                {{-- Инфраструктура --}}
                @if(count($infrastructure) > 0)
                    <div class="px-3 tab-pane fade show" id="v-pills-infrastructure" role="tabpanel" aria-labelledby="v-pills-infrastructure-tab">
                        @include("includes.place.infrastructure")
                    </div>
                @endif

                {{-- Фотографии --}}
                @if(count($place->galleries) >= 2)
                    <div class="tab-pane fade" id="v-pills-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">
                        @include("includes.place.gallery")
                    </div>
                @endif

                {{-- Лечение --}}
                @if(count($treatment) > 0)
                    <div class="px-3 tab-pane fade show" id="v-pills-treatment" role="tabpanel" aria-labelledby="v-pills-treatment-tab">
                        @include("includes.place.treatment")
                    </div>
                @endif
            </div>
        </main>

        {{-- Правый сайдбар --}}
        <aside class="col-12 col-sm-12 d-md-none d-lg-none d-xl-block col-xl-2 order-3 order-sm-3 order-md-3 p-0">
            <twitter></twitter>
        </aside>
    </div>
</div>
@endsection