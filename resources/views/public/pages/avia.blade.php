@extends("layouts.avia")

@section("title")
Авиабилеты
@endsection

@section("description")
Авиабилеты туристическая компания Энерго - Тур.
@endsection

@section("content")
<div class="container bg-white">
    <h3 class="pt-3 pb-3 mb-3 text-center bordered-bottom"><i class="fas fa-plane-departure pr-2"></i>Авиабилеты</h3>
    <script id="WSAScript" type="text/javascript" src="https://widget.liner.travel/v31-res/init.js?site=energotour.com&tariff=1132"></script>
    <div id="WSAContainer" style="width:100%;min-height:600px;background:transparent url('//widget.liner.travel/v31-res/images/loading.gif') no-repeat 50% 50%;"></div>
</div>
@endsection