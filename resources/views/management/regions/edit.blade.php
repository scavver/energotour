@extends('layouts.management')

@section('title')
    Изменить регион
@endsection

@section('content')

    <h3 class="m-3">
        Изменить регион
        <small class="text-muted">Edit region</small>
    </h3>

    @foreach($regions as $region)
        <form action="{{ action('Management\RegionController@update', $region->id) }}" method="post" enctype="multipart/form-data" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Название региона</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $region->name }}" autofocus>

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
            <button type="submit" class="btn btn-primary">Сохранить регион</button>
        </form>
        <br>
    @endforeach

@endsection