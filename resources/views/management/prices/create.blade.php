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
                <label for="hotel_id">Объект размещения</label>

                <select class="form-control" id="hotel_id" name="hotel_id">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="min_price">Цена от</label>

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
        <label for="file">Файл прайса (Изображение / PDF)</label>
        <input type="file" class="form-control-file" id="file" name="file">

        @error('file')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <a href="{{ route('prices.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
    <button class="btn btn-primary" type="submit">Добавить прайс</button>
</form>
<br>
@endsection