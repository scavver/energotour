@extends('layouts.management')

@section('title')
    Редактировать скидки
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать скидки
        <small class="text-muted">Edit discounts</small>
    </h3>

    @foreach($discounts as $discount)
        <form action="{{ action('Management\DiscountController@update', $discount->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="place_id">Place</label>

                        <select class="form-control" id="place_id" name="place_id">
                            @foreach($places as $place)
                                <option value="{{ $place->id }}"
                                        @if($place->id == $discount->place_id) selected="selected" @endif>
                                    {{ $place->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="max_discount">MAX Discount</label>

                        <input id="name" type="text" class="form-control @error('max_discount') is-invalid @enderror" name="max_discount" value="{{ $discount->max_discount }}" required autocomplete="max_discount" autofocus>

                        @error('max_discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="editor">Content</label>
                <textarea class="form-control" id="editor" name="content" rows="3" required>{{ $discount->content }}</textarea>

                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <a href="{{ route('discounts.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection