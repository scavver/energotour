@extends('layouts.management')

@section('title')
    Новый номер
@endsection

@section('content')

    <h3 class="m-3">
        Новый номер
        <small class="text-muted">New room</small>
    </h3>

    <form action="{{ action('Management\RoomController@store') }}" method="post" class="mx-3">
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="place_id">Объект размещения</label>

                    <select class="form-control" id="place_id" name="place_id">
                        @foreach($places as $place)
                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="gallery_id">Галерея</label>

                    <select class="form-control" id="gallery_id" name="gallery_id">
                        <option value="">Без галереи</option>
                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}">{{ $gallery->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="title">Заголовок</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
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
                    <label for="number_of_rooms">Количество комнат</label>

                    <input id="number_of_rooms" type="text" class="form-control @error('number_of_rooms') is-invalid @enderror" name="number_of_rooms" value="{{ old('number_of_rooms') }}" autocomplete="number_of_rooms">

                    @error('number_of_rooms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="category">Категория</label>

                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="view">Вид из номера</label>

                    <input id="view" type="text" class="form-control @error('view') is-invalid @enderror" name="view" value="{{ old('view') }}" autocomplete="view">

                    @error('view')
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
                    <label for="number_of_places">Кол-во основных мест</label>

                    <input id="number_of_places" type="text" class="form-control @error('number_of_places') is-invalid @enderror" name="number_of_places" value="{{ old('number_of_places') }}" required autocomplete="number_of_places">

                    @error('number_of_places')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="number_of_extra_places">Кол-во дополнительных мест</label>

                    <input id="number_of_extra_places" type="text" class="form-control @error('number_of_extra_places') is-invalid @enderror" name="number_of_extra_places" value="{{ old('number_of_extra_places') }}" required autocomplete="number_of_extra_places">

                    @error('number_of_extra_places')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="area">Площадь (кв. м)</label>

                    <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" autocomplete="area">

                    @error('area')
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
                    <label for="furniture">Мебель</label>
                    <textarea class="form-control" id="furniture" name="furniture" rows="3"></textarea>

                    @error('furniture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="equipment">Оборудование</label>
                    <textarea class="form-control" id="equipment" name="equipment" rows="3"></textarea>

                    @error('equipment')
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
                    <label for="bathroom">Санузел</label>
                    <textarea class="form-control" id="bathroom" name="bathroom" rows="3"></textarea>

                    @error('bathroom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="service">Сервис</label>
                    <textarea class="form-control" id="service" name="service" rows="3"></textarea>

                    @error('service')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('rooms.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Добавить номер</button>
    </form>
    <br>
@endsection