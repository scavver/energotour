@extends('layouts.management')

@section('title')
    Регионы
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
                    Регионы
                    <small class="text-muted">Regions</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $regions->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Name</th>
                <th scope="col" class="column-actions pr-3"><a href="{{ action('Management\RegionController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($regions as $region)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $region->id }}</th>
                    <td class="align-middle">{{ $region->name }}</td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\RegionController@destroy', $region->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\RegionController@edit', $region->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
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