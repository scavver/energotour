@extends('layouts.management')

@section('title')
Управление заявками
@endsection

@section('content')
<div class="p-3">
    <h3 class="mb-3">Заявка №{{ $order->id }}<br></h3>
    <h4 class="pb-3 mb-3 bordered-bottom">Размещение</h4>
    <dl class="row">
        <dt class="col-sm-3">Объект размещения</dt>
        <dd class="col-sm-9">{{ $order->hotel->name }}</dd>

        <dt class="col-sm-3">Номер</dt>
        <dd class="col-sm-9">{{ $order->room->name }}</dd>

        <dt class="col-sm-3">Дата заезда</dt>
        <dd class="col-sm-9">{{ date("d.m.Y", strtotime($order->arrival)) }}</dd>

        <dt class="col-sm-3">Дата выезда</dt>
        <dd class="col-sm-9">{{ date("d.m.Y", strtotime($order->departure)) }}</dd>
    </dl>
    <h4 class="pb-3 mb-3 bordered-bottom">Плательщик</h4>
    <dl class="row">
        <dt class="col-sm-3">Фамилия, имя</dt>
        <dd class="col-sm-9">{{ $order->payer->last_name }} {{ $order->payer->first_name }}</dd>

        <dt class="col-sm-3">Телефон</dt>
        <dd class="col-sm-9">{{ $order->payer->phone_number }}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9"><a href="mailto:{{ $order->payer->email }}">{{ $order->payer->email }}</a></dd>
    </dl>
    <h4 class="pb-3 mb-3 bordered-bottom">Туристы</h4>
    <dl class="row">
    @foreach($order->tourists as $tourist)
        <dt class="col-sm-3">Фамилия, имя, год рождения</dt>
        <dd class="col-sm-9">{{ $order->tourist->last_name }} {{ $order->tourist->first_name }} {{ date("d.m.Y", strtotime($order->tourist->date_of_bith)) }}</dd>
    @endforeach
    </dl>
    @if(!empty($order->comment))
    <h4 class="pb-3 mb-3 bordered-bottom">Примечание</h4>
    {{ $order->comment }}
    @endif
</div>
@endsection