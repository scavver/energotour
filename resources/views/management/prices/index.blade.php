@extends('layouts.management')

@section('title')
    Прайсы
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
                    Прайсы
                    <small class="text-muted">Prices</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $prices->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Объект размещения</th>
                <th scope="col" class="text-center">Цена от</th>
                <th scope="col" class="text-center">Документ</th>
                <th scope="col" class="column-actions text-right pr-3"><a href="{{ action('Management\PriceController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($prices as $price)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $price->id }}</th>
                    <td class="align-middle"><a href="{{ asset('management/prices/' . $price->place->id . '/edit') }}">{{ $price->place->name }}</a></td>
                    <td class="align-middle text-center">{{ $price->min_price }}</td>
                    <td class="align-middle text-center">@if(!empty($price->document->path)) <a href="{{ $price->document->path }}" target="_blank">Открыть PDF</a> @elseif(!empty($price->image->path)) <a href="{{ $price->image->path }}" target="_blank">Открыть изображение</a> @endif</td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\PriceController@destroy', $price->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\PriceController@edit', $price->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
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