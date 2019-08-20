<div class="row px-3 pb-3 pt-0">
    @if (count($place->galleries) > 0)
        @foreach($place->galleries as $gallery)
            @if($gallery->is_main != 1)
                <h4 class="pl-3 py-3 m-0">{{ $gallery->name }}</h4>

                <div class="gallery card-columns">
                    @foreach($gallery->images as $image)
                        <a href="{{ asset($image->path) }}" data-toggle="lightbox" data-gallery="{{ $gallery->id }}">
                            <div class="card border-0 m-0">
                                <img src="{{ asset($image->path_sm) }}" class="card-img rounded-0" alt="{{ $image->alt }}">
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        @endforeach
    @else
        <div class="d-flex justify-content-center text-center m-3">
            <span class="text-danger">Не удалось загрузить коллекцию галерей<br>views.public.places.single | app/Http/Controllers/PlaceController</span>
        </div>
    @endif
</div>