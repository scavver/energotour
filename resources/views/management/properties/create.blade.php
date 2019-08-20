@extends('layouts.management')

@section('title')
    Добавить услугу или удобство
@endsection

@section('content')

    <h3 class="m-3">
        Добавить услугу или удобство
        <small class="text-muted">Add service / facility</small>
    </h3>

    <form action="{{ action('Management\PropertyController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>

            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="class">Font Awesome Class - <a href="https://fontawesome.com/icons" target="_blank">Icon list</a></label>

            <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" required autocomplete="class">

            @error('class')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('properties.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection