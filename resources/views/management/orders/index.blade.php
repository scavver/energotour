@extends('layouts.management')

@section('title')
    Управление заявками
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
                    Управление заявками
                    <small class="text-muted">({{ count($orders) }})</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $orders->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Объект</th>
                <th scope="col" class="text-center">Заезд</th>
                <th scope="col" class="text-center">Выезд</th>
                <th scope="col" class="text-center">Категория</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col" class="text-center">Добавлена</th>
                <th scope="col" class="text-center">Обновлена</th>
                <th scope="col" class="column-actions text-right pr-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $order->id }}</th>
                    <td class="align-middle"><a href="{{ asset('hotels/' . $order->hotel->slug) }}" target="_blank">{{ $order->hotel->name }}</a></td>
                    <td class="text-center align-middle">{{ date("d.m.Y", strtotime($order->arrival)) }}</td>
                    <td class="text-center align-middle">{{ date("d.m.Y", strtotime($order->departure)) }}</td>
                    <td class="text-center align-middle">{{ $order->room->category }}</td>
                    <td class="text-center align-middle">{{ $order->status }}</td>
                    <td class="text-center align-middle">{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center align-middle">{{ $order->updated_at->format('d.m.Y H:i:s') }}</td>
                    <td class="text-center pr-3">
                        <form action="{{ action('Management\OrderController@destroy', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\OrderController@show', $order->id) }}" class="btn btn-secondary"><i class="far fa-eye"></i></a>
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