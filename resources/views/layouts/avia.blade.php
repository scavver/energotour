<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Энерго-Тур') }} - @yield("title")</title>
    <meta name="description" content="@yield("description")">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@include("includes.header")

@yield('content')

@include("includes.footer")

<div id="app"></div>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
