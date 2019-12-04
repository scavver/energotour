@extends('layouts.management')

@section('title')
    Новая вкладка: Питание
@endsection

@section('content')

    <h3 class="m-3">
        Новая вкладка: Питание
        <small class="text-muted">New tab: Food</small>
    </h3>

    <form action="{{ action('Management\FoodController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="hotel_id">Объект размещения</label>

            <select class="form-control" id="hotel_id" name="hotel_id" autofocus>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="included">Входит в стоимость</label>

                    <textarea class="form-control @error('included') is-invalid @enderror" id="included" name="included" rows="3"></textarea>

                    @error('included')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="extra">Дополнительно на территории расположены</label>

                    <textarea name="extra" id="extra" rows="3" class="form-control @error('extra') is-invalid @enderror"></textarea>

                    @error('extra')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('food.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Добавить вкладку</button>
    </form>
    <br>
@endsection