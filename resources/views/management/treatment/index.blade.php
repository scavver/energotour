@extends('layouts.management')

@section('title')
    Вкладки: Лечение
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
                    Вкладки: Лечение
                    <small class="text-muted">Treatment tabs</small>
                </h3>
            </div>
            <div class="col p-0 d-flex justify-content-end m-3 align-self-center">{{ $treatment_list->links() }}</div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th scope="col" class="column-id pl-3 text-center">ID</th>
                <th scope="col">Объект размещения</th>
                <th scope="col" class="column-actions text-right pr-3"><a href="{{ action('Management\TreatmentController@create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus mx-3"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($treatment_list as $treatment)
                <tr>
                    <th scope="row" class="align-middle text-center pl-3">{{ $treatment->id }}</th>
                    <td class="align-middle">{{ $treatment->hotel->name }}</td>
                    <td class="text-center align-middle pr-3">
                        <form action="{{ action('Management\TreatmentController@destroy', $treatment->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ action('Management\TreatmentController@edit', $treatment->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
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