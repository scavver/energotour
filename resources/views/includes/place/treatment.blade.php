<div class="room my-3 bordered-bottom">

    <h5 class="pb-2">Основные профили лечения</h5>

    @if(!empty($place->treatment->profiles))
        <p>{{ $place->treatment->profiles }}</p>
    @endif

    <h5 class="pb-2 pt-3 bordered-top">Виды лечения</h5>

    @if(!empty($place->treatment->types))
        {!! $place->treatment->types !!}
    @endif
</div>
