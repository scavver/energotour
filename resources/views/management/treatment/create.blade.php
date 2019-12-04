@extends('layouts.management')

@section('title')
    Новая вкладка: Лечение
@endsection

@section('content')

    <h3 class="m-3">
        Новая вкладка: Лечение
        <small class="text-muted">New tab: Treatment</small>
    </h3>

    <form action="{{ action('Management\TreatmentController@store') }}" method="post" class="mx-3">
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
            <label for="profiles">Основные профили лечения</label>

            <textarea class="form-control @error('profiles') is-invalid @enderror" id="profiles" name="profiles" rows="10"></textarea>

            @error('profiles')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="editor">Виды лечения</label>

            <textarea name="types" id="editor" class="form-control @error('types') is-invalid @enderror" rows="10"></textarea>

            @error('types')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <a href="{{ route('treatment.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Добавить вкладку</button>
    </form>
    <br>
@endsection