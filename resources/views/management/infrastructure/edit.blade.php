@extends('layouts.management')

@section('title')
    Редактировать инфраструктуру
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать инфраструктуру
        <small class="text-muted">Edit infrastructure</small>
    </h3>

    <form action="{{ action('Management\InfrastructureController@update', $infrastructure->id) }}" method="post" class="mx-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="previous" value="{{ URL::previous() }}">

        <div class="form-group">
            <label for="place_id">Объект размещения</label>

            <select class="form-control" id="place_id" name="place_id">
                @foreach($places as $place)
                    <option value="{{ $place->id }}"
                            @if($place->id == $infrastructure->place_id) selected="selected" @endif>
                        {{ $place->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="pool">Бассейн</label>

                    <textarea class="form-control @error('pool') is-invalid @enderror" id="pool" name="pool" rows="3">{{ $infrastructure->pool }}</textarea>

                    @error('pool')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="beach">Пляж</label>

                    <textarea name="beach" id="beach" rows="3" class="form-control @error('beach') is-invalid @enderror">{{ $infrastructure->beach }}</textarea>

                    @error('beach')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="entertainments">Развлечения</label>

                    <textarea name="entertainments" id="entertainments" rows="3" class="form-control @error('entertainments') is-invalid @enderror">{{ $infrastructure->entertainments }}</textarea>

                    @error('entertainments')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="sport">Спорт</label>

                    <textarea name="sport" id="sport" rows="3" class="form-control @error('sport') is-invalid @enderror">{{ $infrastructure->sport }}</textarea>

                    @error('sport')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="wi_fi">Wi-Fi</label>

                    <textarea name="wi_fi" id="wi_fi" rows="3" class="form-control @error('wi_fi') is-invalid @enderror">{{ $infrastructure->wi_fi }}</textarea>

                    @error('wi_fi')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="parking">Паркинг</label>

                    <textarea name="parking" id="parking" rows="3" class="form-control @error('parking') is-invalid @enderror">{{ $infrastructure->parking }}</textarea>

                    @error('parking')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="extra">Дополнительные услуги</label>

            <textarea name="extra" id="extra" rows="10" class="form-control @error('extra') is-invalid @enderror">{{ $infrastructure->extra }}</textarea>
        </div>

        <a href="{{ route('infrastructure.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Сохранить инфраструктуру</button>
    </form>
    <br>
@endsection