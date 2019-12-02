@extends('layouts.management')

@section('title')
    Объекты размещения
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
                    Объекты размещения
                    <small class="text-muted">({{ $places_total }})</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $places->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Статус</th>
                <th scope="col">Название</th>
                <th scope="col" class="text-center">Тип</th>
                <th scope="col" class="text-center">Регион</th>
                <th scope="col" class="text-center">URL</th>
                <th scope="col" class="text-center">Создан</th>
                <th scope="col" class="text-center">Обновлен</th>
                <th scope="col" class="column-actions text-right pr-3"><a href="{{ action('Management\PlaceController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($places as $place)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $place->id }}</th>
                    <td class="text-center align-middle">
                        <i class="fas fa-{{ $place['enabled'] == 1 ? 'eye text-success' : 'eye-slash text-danger' }}"></i>
                    </td>
                    <td class="align-middle"><a href="{{ asset('management/places/' . $place->id . '/edit') }}">{{ $place->name }}</a></td>
                    <td class="text-center align-middle">{{ $place->type->name }}</td>
                    <td class="text-center align-middle">{{ $place->region->name }}</td>
                    <td class="text-center align-middle"><a href="{{ asset('places/' . $place->slug) }}" target="_blank">{{ $place->slug }}</a></td>
                    <td class="text-center align-middle">{{ $place->created_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center align-middle">{{ $place->updated_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center pr-3">
                        <form action="{{ action('Management\PlaceController@destroy', $place->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\PlaceController@edit', $place->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-secondary" id="deleting"><i class="fas fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection