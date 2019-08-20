@extends('layouts.management')

@section('title')
    Изменить регион
@endsection

@section('content')

    <h3 class="m-3">
        Изменить регион
        <small class="text-muted">Edit region</small>
    </h3>

    @foreach($categories as $category)
        <form action="{{ action('Management\CategoryController@update', $category->id) }}" method="post" enctype="multipart/form-data" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cover">Cover</label>
                <input type="file" class="form-control-file" id="cover" name="cover">

                @error('cover')
                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection