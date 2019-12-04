<div class="row px-3 pb-3 pt-0">
    @if (count($hotel->galleries) > 0)
        @foreach($hotel->galleries as $gallery)
            @if($gallery->is_main != 1)
                <h4 class="pl-3 py-3">{{ $gallery->name }}</h4>

                <div class="gallery card-columns px-3 my-0 py-0 bordered-bottom">
                    @foreach($gallery->images as $image)
                        <a href="{{ asset($image->path) }}" data-toggle="lightbox" data-gallery="{{ $gallery->id }}">
                            <div class="card border-0">
                                <img src="{{ asset($image->path_sm) }}" class="card-img rounded-0" alt="{{ $image->alt }}">
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        @endforeach
    @else
        <div class="d-flex justify-content-center text-center m-3">
            <span class="text-danger">Не удалось загрузить коллекцию галерей<br>views.public.hotels.single | app/Http/Controllers/HotelController</span>
        </div>
    @endif
</div>