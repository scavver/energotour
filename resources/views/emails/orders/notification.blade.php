@component('mail::message')
# Получена новая заявка

Плательщик: {{ $payer['last_name'] }} {{ $payer['first_name'] }}

@component('mail::button', ['url' => 'https://energotour.com/management/orders'])
Управление заявками
@endcomponent
@endcomponent
