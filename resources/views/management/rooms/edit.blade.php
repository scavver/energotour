@extends('layouts.management')

@section('title')
    Редактировать номер
@endsection

@section('content')

    <h3 class="m-3">
        Редактировать номер
        <small class="text-muted">Edit room</small>
    </h3>

    <form action="{{ action('Management\RoomController@update', $room->id) }}" method="post" class="mx-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="previous" value="{{ URL::previous() }}">

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="hotel_id">Объект размещения</label>

                    <select class="form-control" id="hotel_id" name="hotel_id">
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}"
                                @if($hotel->id == $room->hotel_id) selected="selected" @endif>
                                {{ $hotel->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="gallery_id">Галерея</label>

                    <select class="form-control" id="gallery_id" name="gallery_id">
                        @if($room->gallery_id == NULL)
                            <option value="" selected="selected">Без галереи</option>
                        @else
                            <option value="">Без галереи</option>
                        @endif
                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}"
                                    @if($gallery->id == $room->gallery_id) selected="selected" @endif>
                                {{ $gallery->hotel->name . ' ➜ ' . $gallery->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="title">Заголовок</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $room->name }}" required autocomplete="name" autofocus>

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

                    <input id="number_of_rooms" type="text" class="form-control @error('number_of_rooms') is-invalid @enderror" name="number_of_rooms" value="{{ $room->number_of_rooms }}" autocomplete="number_of_rooms">

                    @error('number_of_rooms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="category">Категория</label>

                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $room->category }}" required autocomplete="category">

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="view">Вид из номера</label>

                    <input id="view" type="text" class="form-control @error('view') is-invalid @enderror" name="view" value="{{ $room->view }}" autocomplete="view">

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

                    <input id="number_of_places" type="text" class="form-control @error('number_of_places') is-invalid @enderror" name="number_of_places" value="{{ $room->number_of_places }}" required autocomplete="number_of_places">

                    @error('number_of_places')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="number_of_extra_hotels">Кол-во дополнительных мест</label>

                    <input id="number_of_extra_hotels" type="text" class="form-control @error('number_of_extra_hotels') is-invalid @enderror" name="number_of_extra_hotels" value="{{ $room->number_of_extra_hotels }}" autocomplete="number_of_extra_hotels">

                    @error('number_of_extra_hotels')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="area">Площадь (кв. м)</label>

                    <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ $room->area }}" autocomplete="area">

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
                    <textarea class="form-control" id="furniture" name="furniture" rows="3">{{ $room->furniture }}</textarea>

                    @error('furniture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="equipment">Оборудование</label>
                    <textarea class="form-control" id="equipment" name="equipment" rows="3">{{ $room->equipment }}</textarea>

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
                    <textarea class="form-control" id="bathroom" name="bathroom" rows="3">{{ $room->bathroom }}</textarea>

                    @error('bathroom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="service">Сервис</label>
                    <textarea class="form-control" id="service" name="service" rows="3">{{ $room->service }}</textarea>

                    @error('service')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <a href="{{ route('rooms.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Назад</a>
        <button class="btn btn-success" type="submit">Сохранить номер</button>
    </form>
    <br>
@endsection