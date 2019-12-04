@extends('layouts.management')

@section('title')
    Новая инфраструктура
@endsection

@section('content')

    <h3 class="m-3">
        Новая инфраструктура
        <small class="text-muted">New infrastructure</small>
    </h3>

    <form action="{{ action('Management\InfrastructureController@store') }}" method="post" class="mx-3">
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
                    <label for="pool">Бассейн</label>

                    <textarea class="form-control @error('pool') is-invalid @enderror" id="pool" name="pool" rows="3"></textarea>

                    @error('pool')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="beach">Пляж</label>

                    <textarea name="beach" id="beach" rows="3" class="form-control @error('beach') is-invalid @enderror"></textarea>

                    @error('beach')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="entertainments">Развлечения</label>

                    <textarea name="entertainments" id="entertainments" rows="3" class="form-control @error('entertainments') is-invalid @enderror"></textarea>

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

                    <textarea name="sport" id="sport" rows="3" class="form-control @error('sport') is-invalid @enderror"></textarea>

                    @error('sport')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="wi_fi">Wi-Fi</label>

                    <textarea name="wi_fi" id="wi_fi" rows="3" class="form-control @error('wi_fi') is-invalid @enderror"></textarea>

                    @error('wi_fi')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="parking">Паркинг</label>

                    <textarea name="parking" id="parking" rows="3" class="form-control @error('parking') is-invalid @enderror"></textarea>

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

            <textarea name="extra" id="extra" rows="10" class="form-control @error('extra') is-invalid @enderror"></textarea>
        </div>

        <a href="{{ route('infrastructure.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Добавить инфраструктуру</button>
    </form>
    <br>
@endsection