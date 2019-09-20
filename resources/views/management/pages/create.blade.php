@extends('layouts.management')

@section('title')
    Новая страница
@endsection

@section('content')

    <h3 class="m-3">
        Новая страница
        <small class="text-muted">New page</small>
    </h3>

    <form action="{{ action('Management\PageController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="title">Заголовок</label>

                    <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="description">Описание</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="slug">URL</label>

                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>

                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="editor">Содержимое страницы</label>
            <textarea class="form-control" id="editor" name="content" rows="15" required></textarea>

            @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('pages.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-primary" type="submit">Создать страницу</button>
    </form>
    <br>
@endsection