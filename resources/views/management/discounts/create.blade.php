@extends('layouts.management')

@section('title')
    Добавить скидки
@endsection

@section('content')

    <h3 class="m-3">
        Добавить скидки
        <small class="text-muted">New discounts</small>
    </h3>

    <form action="{{ action('Management\DiscountController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="hotel_id">hotel</label>

                    <select class="form-control" id="hotel_id" name="hotel_id">
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="max_discount">MAX Discount</label>

                    <input id="name" type="text" class="form-control @error('max_discount') is-invalid @enderror" name="max_discount" value="{{ old('max_discount') }}" required autocomplete="max_discount" autofocus>

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
            <textarea class="form-control" id="editor" name="content" rows="3" required></textarea>

            @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('discounts.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection