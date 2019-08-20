@extends('layouts.management')

@section('title')
    Изменить тип
@endsection

@section('content')

    <h3 class="m-3">
        Изменить тип
        <small class="text-muted">Edit type</small>
    </h3>

    @foreach($types as $type)
        <form action="{{ action('Management\TypeController@update', $type->id) }}" method="post" class="mx-3">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $type->name }}" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <a href="{{ route('types.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br>
    @endforeach

@endsection