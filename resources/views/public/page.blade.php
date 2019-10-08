@extends("layouts.app")

@section("title")
{{ $page->title }}
@endsection

@section("description")
{{ $page->description }}
@endsection

@section("content")
    <main>
        <div class="container py-4">
            {!! $page->content !!}
        </div>
    </main>
@endsection