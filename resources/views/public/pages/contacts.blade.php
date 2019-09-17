@extends("layouts.app")

@section("title")
    Контакты
@endsection

@section("description")
    Контактные данные компании Энерго Тур - телефон, адрес, электронная почта, график работы офиса.
@endsection

@section("content")
    <main>
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Контакты</h3>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="pb-3">
                            <a href="{{ asset('images/contacts-01.JPG') }}" data-toggle="lightbox" class="text-center">
                                <img src="{{ asset('images/contacts-01.JPG') }}" class="img-fluid rounded" width="100%">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pb-3">
                            <a href="{{ asset('images/contacts-01.JPG') }}" data-toggle="lightbox" class="text-center">
                                <img src="{{ asset('images/contacts-01.JPG') }}" class="img-fluid rounded" width="100%">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <p>ООО "ТК "ЭНЕРГО - ТУР"</p>
                    <p>Адрес: Бульвар Франко, 6А, Симферополь, Республика Крым, Россия</p>
                    <p>Отдел продаж:</p>
                    <ul>
                        <li>8 800 100-10-94 — Многоканальный (Бесплатно по России)</li>
                        <li>+7 978 725-37-47 — Симферополь</li>
                        <li>+7 495 240-91-21 — Для звонков из Москвы</li>
                        <li>+38 050 945-68-88 — Для звонков из Украины</li>
                    </ul>
                    <p>e-mail: <a href="mailto:zakaz@energotour.com">zakaz@energotour.com</a></p>
                    <p>График работы:</p>
                    <ul>
                        <li>пн-пт: 09:00 - 18:00</li>
                        <li>сб: 10:00 - 14:00</li>
                        <li>вс: выходной</li>
                    </ul>
                    <p>Единый федеральный реестр туроператоров: РТО 018028</p>

                </div>
            </div>
        </div>
    </main>
@endsection