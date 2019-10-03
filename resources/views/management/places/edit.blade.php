@extends('layouts.management')

@section('title')
    Изменить объект размещения
@endsection

@section('content')

    <h3 class="m-3">
        Изменить объект размещения
        <small class="text-muted">Edit place</small>
    </h3>

    @foreach($places as $place)
        <form action="{{ action('Management\PlaceController@update', $place->id) }}" method="post" enctype="multipart/form-data" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Название</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $place->name }}" autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="title">Заголовок (SEO)</label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $place->title }}" required>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="description">Описание (SEO)</label>

                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $place->description }}" required>

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
                                <option value="{{ $type->id }}"
                                        @if($type->id == $place->type_id) selected="selected" @endif>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="category_id">Регион</label>

                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($category->id == $place->category_id) selected="selected" @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="slug">URL</label>

                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $place->slug }}" autocomplete="slug">

                @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group form-check-inline">
                @foreach($properties as $property)
                    <input type="checkbox" name="property[]" value="{{$property->id}}" {{ $place->properties->contains($property->id) ? 'checked' : '' }}><i class="{{ $property->class }} fa-fw mx-2" title="{{ $property->title }}"></i><br>
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

                        <input type="text" id="lat" name="lat" class="form-control" value="{{ $place->lat }}">

                        @error('lat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="lng">Долгота</label>

                        <input type="text" id="lng" name="lng" class="form-control" value="{{ $place->lng }}">

                        @error('lng')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <a href="{{ route('places.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
        <br>
    @endforeach

@endsection