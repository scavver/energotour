@extends('layouts.management')

@section('title')
    Новый объект размещения
@endsection

@section('content')

    <h3 class="m-3">
        Новый объект размещения
        <small class="text-muted">New place</small>
    </h3>

    <form action="{{ action('Management\PlaceController@store') }}" method="post" enctype="multipart/form-data" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="name">Название</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch custom-control-inline">
                <input type="hidden" name="enabled" value="0">
                <input type="checkbox" class="custom-control-input" id="enabled" value="1" name="enabled">
                <label class="custom-control-label" for="enabled">Номер объекта размещения</label>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="title">Заголовок (SEO)</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="description">Описание (SEO)</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                    @error('description')
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
                    <label for="type_id">Тип объекта</label>

                    <select class="form-control" id="type_id" name="type_id">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="region_id">Регион</label>

                    <select class="form-control" id="region_id" name="region_id">
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="slug">URL</label>

            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug">

            @error('slug')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group form-check-inline">
            @foreach($properties as $property)
                <input type="checkbox" name="property[]" value="{{ $property->id }}"><i class="{{ $property->class }} fa-fw mx-2" title="{{ $property->title }}"></i><br>
            @endforeach
        </div>

        <div class="form-group">
            <label for="image">Изображение объекта (800х400)</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="lat">Широта</label>

                    <input type="text" id="lat" name="lat" class="form-control" placeholder="44.4565556">

                    @error('lat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="lng">Долгота</label>

                    <input type="text" id="lng" name="lng" class="form-control" placeholder="34.1390937">

                    @error('lng')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('places.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-primary" type="submit">Добавить объект</button>
    </form>
    <br>
@endsection