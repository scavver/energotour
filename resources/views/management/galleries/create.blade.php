@extends('layouts.management')

@section('title')
    Создать галерею
@endsection

@section('content')

    <h3 class="m-3">
        Создать галерею
        <small class="text-muted">New gallery</small>
    </h3>

    <form action="{{ action('Management\GalleryController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name">Name</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="place_id">Place</label>

                    <select class="form-control" id="place_id" name="place_id">
                        <option value="">Без привязки к месту</option>
                        @foreach($places as $place)
                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <a href="{{ route('galleries.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection