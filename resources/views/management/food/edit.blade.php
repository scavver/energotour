@extends('layouts.management')

@section('title')
    Редактировать вкладку
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать вкладку
        <small class="text-muted">Edit tab</small>
    </h3>

    <form action="{{ action('Management\FoodController@update', $food->id) }}" method="post" class="mx-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="previous" value="{{ URL::previous() }}">

        <div class="form-group">
            <label for="place_id">Объект размещения</label>

            <select class="form-control" id="place_id" name="place_id">
                @foreach($places as $place)
                    <option value="{{ $place->id }}"
                            @if($place->id == $food->place_id) selected="selected" @endif>
                        {{ $place->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="included">Входит в стоимость</label>

                    <textarea class="form-control @error('included') is-invalid @enderror" id="included" name="included" rows="3">{{ $food->included }}</textarea>

                    @error('included')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="extra">Дополнительно на территории расположены</label>

                    <textarea name="extra" id="extra" rows="3" class="form-control @error('extra') is-invalid @enderror">{{ $food->extra }}</textarea>

                    @error('extra')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('food.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Сохранить вкладку</button>
    </form>
    <br>
@endsection