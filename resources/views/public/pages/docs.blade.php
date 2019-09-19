@extends("layouts.app")

@section("title")
    Как оплатить
@endsection

@section("description")
    Инструкция по оплате тура при заказе через туристическую компанию Энерго Тур.
@endsection

@section("content")
    <main>
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom text-center">Регистрационные документы</h3>

            <div class="row">
                <div class="col-6 text-center">
                    <a href="{{ asset('images/docs-01.png') }}" data-toggle="lightbox" class="text-center">
                        <img src="https://x.energotour.com/images/docs-02.jpg" class="img-fluid rounded" width="60%">
                    </a>
                </div>

                <div class="col-6 text-center">
                    <a href="{{ asset('images/docs-01.png') }}" data-toggle="lightbox" class="text-center">
                        <img src="https://x.energotour.com/images/docs-01.jpg" class="img-fluid rounded" width="60%">
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection