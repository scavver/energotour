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
        <!-- Left Sidebar -->
        <aside class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 order-1 order-sm-1 order-md-1 px-0">
            <div class="sticky-top p-3">
                <!-- Navigation Pills -->
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- <a class="text-right nav-link" id="v-pills-location-tab" data-toggle="pill" href="#v-pills-location" role="tab" aria-controls="v-pills-location" aria-selected="false">Показать на карте</a> -->
                    <a class="text-center text-md-right nav-link active" id="v-pills-description-tab" data-toggle="pill" href="#v-pills-description" role="tab" aria-controls="v-pills-description" aria-selected="true">Описание</a>
                    <a class="text-center text-md-right nav-link" id="v-pills-location-tab" data-toggle="pill" href="#v-pills-photo" role="tab" aria-controls="v-pills-photo" aria-selected="false">Фотографии</a>
                    <a class="text-center text-md-right nav-link" id="v-pills-discount-tab" data-toggle="pill" href="#v-pills-discount" role="tab" aria-controls="v-pills-discount" aria-selected="false">Наши скидки</a>
                    <a class="text-center text-md-right nav-link" id="v-pills-price-tab" data-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="false">Прайс-лист</a>
                </div>

                <!-- Banner -->
                <a href="{{ url('places/poltava') }}"><img src="{{ asset('images/banner.png') }}" class="img-fluid pt-3 rounded d-none d-md-block" id="banner" alt="Санаторий Полтава Крым Саки"></a>
                <p class="text-muted text-center d-none d-md-block"><i class="fab fa-hotjar fa-fw mx-1 my-2"></i> Горящее предложение</p>
            </div>
        </aside>
        <!-- End: Left Sidebar -->

        <!-- Content -->
        <main class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-8 order-2 order-sm-2 order-md-2 shadow-sm bg-white min-vh-100 px-0 order-0 order-sm-0 order-md-1 order-xl-1 bg-white">
            <h3 class="px-3 pt-3 pb-2">{{ $place->name }}<small> / {{ $place->type->name }} / {{ $place->category->name }}</small></h3>

            <div class="tab-content" id="v-pills-tabContent">
                <!-- Tab: Description -->
                <div class="px-3 tab-pane fade show active" id="v-pills-description" role="tabpanel" aria-labelledby="v-pills-description-tab">
                    @include("includes.place.description")
                </div>

                <!-- Tab: Gallery -->
                <div class="tab-pane fade" id="v-pills-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">
                    @include("includes.place.gallery")
                </div>

                <!-- Tab: Price -->
                <div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
                    @include("includes.place.price")
                </div>

                <!-- Tab: Discount -->
                <div class="tab-pane fade" id="v-pills-discount" role="tabpanel" aria-labelledby="v-pills-discount-tab">
                    @include("includes.place.discount")
                </div>
            </div>
        </main>
        <!-- End: Content -->


        <aside class="col-12 col-sm-12 d-md-none d-lg-none d-xl-block col-xl-2 order-3 order-sm-3 order-md-3 p-0">
            <twitter></twitter>
        </aside>
    </div>
</div>
@endsection