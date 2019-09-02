@foreach($rooms as $room)
<div class="room my-3 bordered-bottom">
    <h5 class="pb-2">{{ $room->name }}</h5>

    @if(!empty($room->gallery))
    <div class="row px-3 pb-1 pt-0">
        @if (count($room->gallery->images) >= 1)
            <div class="gallery card-columns">
                @foreach($room->gallery->images as $image)
                    <a href="{{ asset($image->path) }}" data-toggle="lightbox" data-gallery="{{ $image->gallery_id }}">
                        <div class="card border-0">
                            <img src="{{ asset($image->path_sm) }}" class="card-img rounded-0" alt="{{ $image->alt }}">
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    @endif

    <div class="room">
        <dl class="row">
            @if(!empty($room->number_of_rooms))
            <dt class="col-6 col-md-4">Кол-во комнат</dt>
            <dd class="col-6 col-md-8">{{ $room->number_of_rooms }}</dd>
            @endif

            @if(!empty($room->cateogry))
            <dt class="col-6 col-md-4">Категория номера</dt>
            <dd class="col-6 col-md-8">{{ $room->category}}</dd>
            @endif


            @if(!empty($room->view))
            <dt class="col-6 col-md-4">Вид из номера</dt>
            <dd class="col-6 col-md-8">{{ $room->view }}</dd>
            @endif

            @if(!empty($room->number_of_places))
            <dt class="col-6 col-md-4">Кол-во основных мест</dt>
            <dd class="col-6 col-md-8">{{ $room->number_of_places }}</dd>
            @endif


            @if(!empty($room->number_of_extra_places))
            <dt class="col-6 col-md-4">Кол-во дополнительных мест</dt>
            <dd class="col-6 col-md-8">{{ $room->number_of_extra_places }}</dd>
            @endif

            @if(!empty($room->area))
            <dt class="col-6 col-md-4">Площадь (кв.м)</dt>
            <dd class="col-6 col-md-8">{{ $room->area }}</dd>
            @endif


            @if(!empty($room->furniture))
            <dt class="col-6 col-md-4">Мебель</dt>
            <dd class="col-6 col-md-8">{{ $room->furniture }}</dd>
            @endif

            @if(!empty($room->equipment))
            <dt class="col-6 col-md-4">Оборудование</dt>
            <dd class="col-6 col-md-8">{{ $room->equipment }}</dd>
            @endif


            @if(!empty($room->bathroom))
            <dt class="col-6 col-md-4">Санузел</dt>
            <dd class="col-6 col-md-8">{{ $room->bathroom }}</dd>
            @endif

            @if(!empty($room->service))
            <dt class="col-6 col-md-4">Сервис</dt>
            <dd class="col-6 col-md-8">{{ $room->service }}</dd>
            @endif
        </dl>
    </div>

</div>
@endforeach