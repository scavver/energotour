@component('mail::message')
# Заявка на бронирование оформлена

## {{ $room['name'] }}

Объект размещения: **{{ $hotel['name'] }}**<br>
Дата заезда: **{{ $arrival }}**<br>
Дата выезда: **{{ $departure }}**

## Плательщик

**{{ $payer['last_name'] }} {{ $payer['first_name'] }}**<br>
Контактный телефон: **{{ $payer['phone_number'] }}**<br>
Email: **{{ $payer['email'] }}**

## Туристы

@foreach($tourists as $tourist)
**{{ $tourist['last_name'] }} {{ $tourist['first_name'] }}**, **{{ $tourist['date_of_birth'] }}** года рождения<br>
@endforeach

## Примечание

{{ $order['comment'] }}

@component('mail::button', ['url' => 'https://energotour.com'])
На сайт компании
@endcomponent

Данное письмо было отправлено автоматически.<br>
Для уточнения деталей, пожалуйста свяжитесь с менеджером.<br>
Обратная связь: <a href="mailto:zakaz@energotour.com">zakaz@energotour.com</a>

С уважением,<br>
{{ config('app.name') }}
@endcomponent
