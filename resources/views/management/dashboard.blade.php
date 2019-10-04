@extends('layouts.management')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col p-0 d-flex align-self-center">
                <h3 class="m-3">
                    Контрольная панель
                    <small class="text-muted">Control panel</small>
                </h3>
            </div>
        </div>
    </div>

    <div class="px-3">
        Всего услуг и удобств: {{ $properties }}<br>
        Всего мест: {{ $places }}<br>
        Всего галерей: {{ $galleries }}<br>
        Всего картинок: {{ $images }}<br>
        Прайсов: {{ $prices }}<br>
        Скидок: {{ $discounts }}
    </div>
@endsection