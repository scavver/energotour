@extends('layouts.management')

@section('title')
    Изменить услугу или удобство
@endsection

@section('content')

    <h3 class="m-3">
        Изменить услугу или удобство
        <small class="text-muted">Edit service / facility</small>
    </h3>

    @foreach($properties as $property)
        <form action="{{ action('Management\PropertyController@update', $property->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>

                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $property->title }}" autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="class">Font Awesome Class</label>

                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ $property->class }}">

                @error('class')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <a href="{{ route('properties.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection