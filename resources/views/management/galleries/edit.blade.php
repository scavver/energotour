@extends('layouts.management')

@section('title')
    Редактировать галерею
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать гелерею
        <small class="text-muted">Edit gallery</small>
    </h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mx-2 mb-2" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @foreach($galleries as $gallery)
        <form action="{{ action('Management\GalleryController@update', $gallery->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="name">Name</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $gallery->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="place_id">Place</label>

                        <select class="form-control" id="place_id" name="place_id">
                            @if($gallery->place_id == null)
                                <option value="" selected="selected">Без привязки к месту</option>
                            @else
                                <option value="">Без привязки к месту</option>
                            @endif

                            @foreach($places as $place)
                            <option value="{{ $place->id }}"
                                    @if($place->id == $gallery->place_id) selected="selected" @endif>
                                {{ $place->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch custom-control-inline">
                    <input type="hidden" name="is_room" value="0">
                    <input type="checkbox" class="custom-control-input" id="is_room" value="1" name="is_room" {{ $gallery->is_room == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="is_room">Номер объекта размещения</label>
                </div>

                <div class="custom-control custom-switch custom-control-inline">
                    <input type="hidden" name="is_main" value="0">
                    <input type="checkbox" class="custom-control-input" id="is_main" value="1" name="is_main" {{ $gallery->is_main == 1 ? 'checked' : '' }}>
                    <label class="custom-control-label" for="is_main">Слайдер объекта размещения</label>
                </div>
            </div>

            <a href="{{ route('galleries.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <a href="{{ url()->current() }}" class="btn btn-primary"><i class="fas fa-retweet"></i> Reload</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

    <image-uploader></image-uploader>

    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Alt</th>
                <th scope="col">Path</th>
                <th scope="col">Priority</th>
                <th scope="col">Preview</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Updated At</th>
                <th scope="col" class="column-actions pr-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $image)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $image->id }}</th>
                    <td class="align-middle">{{ $image->alt }}</td>
                    <td class="align-middle">{{ $image->path }}</td>
                    <td class="align-middle">{{ $image->priority }}</td>
                    <td class="align-middle">{{ $image->preview }}</td>
                    <td class="text-center align-middle">{{ $image->created_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center align-middle">{{ $image->updated_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\ImageController@destroy', $image->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\ImageController@edit', $image->id) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-secondary" id="deleting"><i class="fas fa-times"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection