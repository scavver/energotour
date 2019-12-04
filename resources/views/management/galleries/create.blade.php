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
                    <label for="hotel_id">Hotel</label>

                    <select class="form-control" id="hotel_id" name="hotel_id">
                        <option value="">Без привязки к месту</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch custom-control-inline">
                <input type="hidden" name="is_room" value="0">
                <input type="checkbox" class="custom-control-input" id="is_room" value="1" name="is_room">
                <label class="custom-control-label" for="is_room">Номер объекта размещения</label>
            </div>

            <div class="custom-control custom-switch custom-control-inline">
                <input type="hidden" name="is_main" value="0">
                <input type="checkbox" class="custom-control-input" id="is_main" value="1" name="is_main">
                <label class="custom-control-label" for="is_main">Слайдер объекта размещения</label>
            </div>
        </div>

        <a href="{{ route('galleries.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection