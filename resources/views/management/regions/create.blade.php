@extends('layouts.management')

@section('title')
    Добавить регион
@endsection

@section('content')

    <h3 class="m-3">
        Добавить регион
        <small class="text-muted">Add region</small>
    </h3>

    <form action="{{ action('Management\RegionController@store') }}" method="post" enctype="multipart/form-data" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="name">Название региона</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Изображение региона</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('regions.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-primary" type="submit">Добавить регион</button>
    </form>
    <br>
@endsection