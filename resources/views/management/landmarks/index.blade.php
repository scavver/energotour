@extends('layouts.management')

@section('title')
    Достопримечательности
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
                    Достопримечательности
                    <small class="text-muted">Landmarks</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $landmarks->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col" class="text-center">Добавлена</th>
                <th scope="col" class="text-center">Последняя правка</th>
                <th scope="col" class="column-actions text-right pr-3"><a href="{{ action('Management\LandmarkController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($landmarks as $landmark)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $landmark->id }}</th>
                    <td class="align-middle">{{ $landmark->title }}</td>
                    <td class="align-middle">{{ $landmark->region->name }}</td>
                    <td class="align-middle">{{ $landmark->user->name }}</td>
                    <td class="text-center align-middle">{{ $landmark->created_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center align-middle">{{ $landmark->updated_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\LandmarkController@destroy', $landmark->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\LandmarkController@edit', $landmark->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
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