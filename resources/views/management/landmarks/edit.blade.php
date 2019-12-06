@extends('layouts.management')

@section('title')
    Редактировать страницу
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать страницу
        <small class="text-muted">Edit landmark</small>
    </h3>

    <form action="{{ action('Management\LandmarkController@update', $landmark->id) }}" enctype="multipart/form-data" method="post" class="mx-3">
        @csrf
        @method('PUT')

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="title">Заголовок</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $landmark->title }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="description">Описание</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $landmark->description }}" required autocomplete="description" autofocus>

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
                    <label for="slug">URL</label>

                    <input id="name" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $landmark->slug }}" required autocomplete="slug" autofocus>

                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="col">
                    <label for="region_id">Регион</label>

                    <select class="form-control" id="region_id" name="region_id">
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}"
                                    @if($region->id == $landmark->region_id) selected="selected" @endif>
                                {{ $region->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="row">
                <div class="col">
                    <label for="image">Обложка</label>
                    <div class="input-group" id="image">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile" name="image">
                            <label class="custom-file-label" for="inputFile">800x400px</label>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <label for="gallery">Галлерея</label>
                    <select class="form-control" id="gallery" name="gallery">
                        @if(empty($landmark->gallery))
                            <option value="" selected="selected">Нету</option>
                        @else
                            <option value="">Нету</option>
                        @endif

                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}"
                                    @if($gallery->type_id == $landmark->id) selected="selected" @endif>
                                {{ $gallery->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="editor">Материал</label>
            <textarea class="form-control" id="editor" name="content" rows="15" required>{{ $landmark->content }}</textarea>

            @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('landmarks.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
    <br>

@endsection