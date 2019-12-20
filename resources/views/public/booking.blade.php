@extends("layouts.app")

@section("title")
Забронировать отдых в Крыму
@endsection

@section("description")
Форма онлайн-бронирования номеров отелей и санаториев в Крыму на официальном сайте туроператора Энерго-Тур.
@endsection

@section("content")
<main>
    <div class="container bg-white py-4 d-flex justify-content-center mx-auto">
        <div class="col-12 col-sm-12 col-md-8">
            <iframe src="https://samo.energotour.com/fast_search" frameborder="0" height="387px" width="100%" scrolling="no"></iframe>
                <p class="text-center">
                    <i class="fas fa-info-circle fa-fw mr-1"></i> Если Вы не нашли желаемый санаторий или отель в списке – <br>
                    <a href="/hotels/order" target="_blank" style="color: #fb0053 !important"><strong>оставьте заявку</strong></a> на бронирование.
                </p>
        </div>
    </div>
</main>
@endsection