<div class="room my-3 bordered-bottom">

    <h5 class="pb-2">Входит в стоимость</h5>

    @if(!empty($place->food->included))
        <p>{{ $place->food->included }}</p>
    @endif

    <h5 class="pb-2 pt-3 bordered-top">Дополнительно на территории расположены</h5>

    @if(!empty($place->food->extra))
        {!! $place->food->extra !!}
    @endif
</div>
