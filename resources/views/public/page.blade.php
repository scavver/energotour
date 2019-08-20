@extends("layouts.app")

@section("title")
    {{ $page->title }}
@endsection

@section("description")
    {{ $page->description }}
@endsection

@section("content")
    <div class="container">
        {!! $page->content !!}
    </div>
@endsection