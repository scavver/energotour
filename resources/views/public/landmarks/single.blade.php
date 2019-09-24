@extends("layouts.app")

@section("title")
    {{ $landmark->title }}
@endsection

@section("description")
    Достопримечательности Крыма - что посетить в Крыму, уникальные места.
@endsection

@section("content")
    <landmark></landmark>
@endsection