@extends("layouts.app")

@section("title")
    Как забронировать тур
@endsection

@section("description")
    Инструкция по онлайн бронированию туров и номеров через компанию Энерго Тур.
@endsection

@section("content")
    <main>
        <div class="container pb-3">
            <h3 class="pt-3 pb-3 mb-3 bordered-bottom">Как забронировать тур</h3>

            <p><strong>1.</strong> Выбрать понравившийся тур. Кнопка «Забронировать» перенаправит Вас на страницу он-лайн бронирования.</p>

            <p>
                <strong>2.</strong> На странице он-лайн бронирования указать требуемые даты, количество дней, количество
                отдыхающих(если есть дети - указать их возраст), поставить галочку на выбранный Вами отель и
                нажать кнопку «Искать».
            </p>

            <p>
                <strong>3.</strong> Внизу страницы появляется подборка доступных к бронированию тарифов и категорий
                номеров. Нажать кнопку на выбранный тариф с указанной ценой.
            </p>

            <div class="pb-3">
                <a href="{{ asset('images/how-to-booking-01.png') }}" data-toggle="lightbox" class="text-center">
                    <img src="{{ asset('images/how-to-booking-01.png') }}" class="img-fluid rounded" width="40%">
                </a>
            </div>

            <p>
                <strong>4.</strong> Заполнить поля предлагаемой формы. Проставить галочку о том, что условиями договора
                согласны ( Договор можно прочитать при наведении курсора на «Договор»)(стрелочки на форму,
                на галочку, на договор и на бронировать)
            </p>

            <div class="pb-3">
                <a href="{{ asset('images/how-to-booking-02.png') }}" data-toggle="lightbox" class="text-center">
                    <img src="{{ asset('images/how-to-booking-02.png') }}" class="img-fluid rounded" width="40%">
                </a>
            </div>

            <p>
                <strong>Вы получаете подтверждение отправленной заявки с выбранными Вами параметрами.</strong>
            </p>

            <p>
                <strong>
                    В течение суток Вы получите счет на оплату, если заказанный Вами номер доступен к
                    бронированию. В случае отсутствия заказанного номера, Вам будет предложен альтернативный
                    вариант.
                </strong>
            </p>
        </div>
    </main>
@endsection