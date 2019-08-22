@extends('layouts.management')

@section('title')
    Редактировать страницу
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать страницу
        <small class="text-muted">Edit page</small>
    </h3>

    <form action="{{ action('Management\PageController@update', $page->id) }}" method="post" class="mx-3">
        @csrf
        @method('PUT')

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="title">Заголовок</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $page->title }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="description">Описание</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $page->description }}" required autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="slug">URL</label>

                    <input id="name" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $page->slug }}" required autocomplete="slug" autofocus>

                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="content">Содержимое страницы</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $page->content }}</textarea>

            @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('pages.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
    <br>

@endsection