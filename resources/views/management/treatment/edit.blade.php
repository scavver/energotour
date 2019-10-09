@extends('layouts.management')

@section('title')
    Редактировать вкладку
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать вкладку
        <small class="text-muted">Edit tab</small>
    </h3>

    <form action="{{ action('Management\TreatmentController@update', $treatment->id) }}" method="post" class="mx-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="previous" value="{{ URL::previous() }}">

        <div class="form-group">
            <label for="place_id">Объект размещения</label>

            <select class="form-control" id="place_id" name="place_id" autofocus>
                @foreach($places as $place)
                    <option value="{{ $place->id }}"
                            @if($place->id == $treatment->place_id) selected="selected" @endif>
                        {{ $place->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="profiles">Основные профили лечения</label>

            <textarea class="form-control @error('profiles') is-invalid @enderror" id="profiles" name="profiles" rows="10">{{ $treatment->profiles }}</textarea>

            @error('profiles')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="editor">Виды лечения</label>

            <textarea name="types" id="editor" class="form-control @error('types') is-invalid @enderror" rows="10">{{ $treatment->types }}</textarea>

            @error('types')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <a href="{{ route('treatment.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Сохранить вкладку</button>
    </form>
    <br>
@endsection