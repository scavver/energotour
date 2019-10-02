@extends('layouts.management')

@section('title')
    Добавить прайс
@endsection

@section('content')

    <h3 class="m-3">
        Добавить прайс
        <small class="text-muted">New price</small>
    </h3>

    <form action="{{ action('Management\PriceController@store') }}" method="post" enctype="multipart/form-data" class="mx-3">
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="place_id">Place</label>

                    <select class="form-control" id="place_id" name="place_id">
                        @foreach($places as $place)
                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="min_price">min price</label>

                    <input id="name" type="text" class="form-control @error('min_price') is-invalid @enderror" name="min_price" value="{{ old('min_price') }}" required autocomplete="min_price" autofocus>

                    @error('min_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="image">Cover</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('prices.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection