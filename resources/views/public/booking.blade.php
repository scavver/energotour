@extends("layouts.app")

@section("title")
    Онлайн бронирование
@endsection

@section("description")
    Онлайн бронирование жилья, санаториев и отелей в Крыму.
@endsection

@section("content")
    <main>
        <div class="container py-4 d-flex justify-content-center mx-auto">
            <div class="col-12 col-sm-12 col-md-8">
                <iframe src="https://samo.energotour.com/fast_search" frameborder="0" height="387px" width="100%" scrolling="no"></iframe>
            </div>
        </div>
    </main>
@endsection