@extends('layouts.management')

@section('title')
    Скидки
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
                    Скидки
                    <small class="text-muted">Discounts</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $discounts->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Объект размещения</th>
                <th scope="col" class="text-center">Стоимость от</th>
                <th scope="col" class="text-center">Скидка до</th>
                <th scope="col" class="text-center">Итоговая стоимость от</th>
                <th scope="col" class="column-actions text-right pr-3"><a href="{{ action('Management\DiscountController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($discounts as $discount)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $discount->id }}</th>
                    <td class="align-middle"><a href="{{ asset('management/discounts/' . $discount->id . '/edit') }}">{{ $discount->place->name }}</a></td>
                    <td class="align-middle text-center">@if(!empty($discount->place->price->min_price)){{ $discount->place->price->min_price }}@else – @endif</td>
                    <td class="align-middle text-center">-{{ $discount->max_discount }}%</td>
                    <td class="align-middle text-center">@if(!empty($discount->place->price->min_price)){{ intval($discount->place->price->min_price - ($discount->place->price->min_price * ($discount->max_discount / 100))) }}@else – @endif</td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\DiscountController@destroy', $discount->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\DiscountController@edit', $discount->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
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