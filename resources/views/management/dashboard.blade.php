@extends('layouts.management')

@section('title')
Контрольная панель
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
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="dashboard-block">
                <i class="fas fa-hotel fa-fw"></i>
                <span>
                    <strong>Объекты размещения</strong><br>
                    Активных: {{ $models['hotel']['enabled'] }}<br>
                    Всего: {{ $models['hotel']['all'] }}<br>
                </span>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="dashboard-block">
                <i class="fas fa-database fa-fw"></i>
                <span>
                    <strong>База данных</strong><br>
                    Изображений: {{ $models['image']['all'] }}<br>
                    Документов: {{ $models['document']['all'] }}<br>
                </span>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="dashboard-block">
                <i class="fas fa-hdd fa-fw"></i>
                <span>
                    <strong>--</strong><br>
                    --
                    --
                </span>
            </div>
        </div>
    </div>
</div>
@endsection