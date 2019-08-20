@extends('layouts.management')

@section('title')
    Редактировать изображение
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать изображение
        <small class="text-muted">Edit image</small>
    </h3>

    @foreach($images as $image)
        <form action="{{ action('Management\ImageController@update', $image->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="alt">Alt</label>

                <input id="alt" type="text" class="form-control @error('alt') is-invalid @enderror" name="alt" value="{{ $image->alt }}" autofocus>

                @error('alt')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control" type="text" placeholder="{{ $image->path }}" readonly>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="priority">Priority</label>

                        <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ $image->priority }}">

                        @error('priority')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="gallery_id">Gallery ID</label>

                        <select class="form-control" id="gallery_id" name="gallery_id">
                            @foreach($galleries as $gallery)
                                <option value="{{ $gallery->id }}"
                                        @if($gallery->id == $image->gallery_id) selected="selected" @endif>
                                    {{ $gallery->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection