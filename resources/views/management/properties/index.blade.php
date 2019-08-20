@extends('layouts.management')

@section('title')
    Услуги и удобства
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mx-2 mb-0" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col p-0 d-flex align-self-center">
                <h3 class="m-3">
                    Услуги и удобства
                    <small class="text-muted">Services and facilities</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $properties->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Icon (Font Awesome)</th>
                <th scope="col" class="column-actions pr-3"><a href="{{ action('Management\PropertyController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $property->id }}</th>
                    <td class="align-middle">{{ $property->title }}</td>
                    <td class="align-middle"><i class="{{ $property->class }} fa-fw"></i></td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\PropertyController@destroy', $property->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\PropertyController@edit', $property->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-secondary"><i class="fas fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection