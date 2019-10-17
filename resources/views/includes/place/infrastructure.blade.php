<div class="room my-3 bordered-bottom">
    <h5 class="pb-2">Инфраструктура</h5>

    <div class="room">
        <dl class="row">
            @if(!empty($place->infrastructure->pool))
                <dt class="col-6 col-md-4">Бассейн</dt>
                <dd class="col-6 col-md-8">{{ $place->infrastructure->pool }}</dd>
            @endif

            @if(!empty($place->infrastructure->beach))
                <dt class="col-6 col-md-4">Пляж</dt>
                <dd class="col-6 col-md-8">{{ $place->infrastructure->beach }}</dd>
            @endif

            @if(!empty($place->infrastructure->entertainments))
                <dt class="col-6 col-md-4">Развлечения</dt>
                <dd class="col-6 col-md-8">{{ $place->infrastructure->entertainments }}</dd>
            @endif

            @if(!empty($place->infrastructure->sport))
                <dt class="col-6 col-md-4">Спорт</dt>
                <dd class="col-6 col-md-8">{{ $place->infrastructure->sport }}</dd>
            @endif

            @if(!empty($place->infrastructure->wi_fi))
                <dt class="col-6 col-md-4">Wi-Fi</dt>
                <dd class="col-6 col-md-8">{{ $place->infrastructure->wi_fi }}</dd>
            @endif

            @if(!empty($place->infrastructure->parking))
                <dt class="col-6 col-md-4">Паркинг</dt>
                <dd class="col-6 col-md-8">{{ $place->infrastructure->parking }}</dd>
            @endif

            @if(!empty($place->infrastructure->parking))
                <dt class="col-6 col-md-4">Дополнительно</dt>
                <dd class="col-6 col-md-8"><p class="content">{{ $place->infrastructure->extra }}</p></dd>
            @endif
        </dl>
    </div>

</div>
