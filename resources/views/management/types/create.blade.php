@extends('layouts.management')

@section('title')
    Добавить тип
@endsection

@section('content')

    <h3 class="m-3">
        Добавить тип
        <small class="text-muted">Add type</small>
    </h3>

    <form action="{{ action('Management\TypeController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <a href="{{ route('types.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <br>
@endsection