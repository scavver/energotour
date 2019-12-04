<div class="room my-3 bordered-bottom">

    <h5 class="pb-2">Основные профили лечения</h5>

    @if(!empty($hotel->treatment->profiles))
        <p class="content">{{ $hotel->treatment->profiles }}</p>
    @endif

    <h5 class="pb-2 pt-3 bordered-top">Виды лечения</h5>

    @if(!empty($hotel->treatment->types))
        {!! $hotel->treatment->types !!}
    @endif
</div>
