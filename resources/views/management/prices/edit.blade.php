@extends('layouts.management')

@section('title')
    Изменить прайс
@endsection

@section('content')

    <h3 class="m-3">
        Изменить прайс
        <small class="text-muted">Edit price</small>
    </h3>

    @foreach($prices as $price)
        <form action="{{ action('Management\PriceController@update', $price->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="place_id">Place</label>

                        <select class="form-control" id="place_id" name="place_id">
                            @foreach($places as $place)
                                <option value="{{ $place->id }}"
                                        @if($place->id == $price->place_id) selected="selected" @endif>
                                    {{ $place->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="min_price">min price</label>

                        <input id="name" type="text" class="form-control @error('min_price') is-invalid @enderror" name="min_price" value="{{ $price->min_price }}" required autocomplete="min_price" autofocus>

                        @error('min_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="editor">Content</label>
                <textarea class="form-control" id="editor" name="content" rows="3" required>{{ $price->content }}</textarea>

                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <a href="{{ route('prices.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection