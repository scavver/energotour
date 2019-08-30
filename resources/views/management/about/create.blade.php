@extends('layouts.management')

@section('title')
    Новое описание
@endsection

@section('content')

    <h3 class="m-3">
        Новое описание
        <small class="text-muted">New description</small>
    </h3>

    <form action="{{ action('Management\AboutController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <label for="place_id">Объект размещения</label>

            <select class="form-control" id="place_id" name="place_id" autofocus>
                @foreach($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="editor">Описание</label>

            <textarea name="description" id="editor" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="rules_of_settlement">Правила заселения</label>

                    <textarea class="form-control @error('rules_of_settlement') is-invalid @enderror" id="rules_of_settlement" name="rules_of_settlement" rows="3"></textarea>

                    @error('rules_of_settlement')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="included_services">Условия включенные в стоимость</label>

                    <textarea name="included_services" id="included_services" rows="3" class="form-control @error('included_services') is-invalid @enderror"></textarea>

                    @error('included_services')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="address">Адрес</label>

                    <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror"></textarea>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="territory">Территория</label>

                    <textarea name="territory" id="territory" rows="3" class="form-control @error('territory') is-invalid @enderror"></textarea>

                    @error('territory')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="reconstruction">Реконструкция</label>

                    <textarea name="reconstruction" id="reconstruction" rows="3" class="form-control @error('reconstruction') is-invalid @enderror"></textarea>

                    @error('reconstruction')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="children">Дети</label>

                    <textarea name="children" id="children" rows="3" class="form-control @error('children') is-invalid @enderror"></textarea>

                    @error('children')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('about.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Добавить описание</button>
    </form>
    <br>
@endsection