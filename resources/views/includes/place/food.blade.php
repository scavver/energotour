<div class="room my-3 bordered-bottom">

    @if(!empty($place->food->included))
        <h5 class="pb-2">Входит в стоимость</h5>
        <p class="content">{{ $place->food->included }}</p>
    @endif

    @if(!empty($place->food->extra))
        <h5 class="pb-2 pt-3 bordered-top">Дополнительно на территории расположены</h5>
        <p class="content">{{ $place->food->extra }}</p>
    @endif
</div>
