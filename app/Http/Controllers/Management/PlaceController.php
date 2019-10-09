<?php

namespace App\Http\Controllers\Management;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use App\Region;
use App\Place;
use App\Image;
use App\Type;

class PlaceController extends Controller
{
    // Список всех мест размещения
    public function index()
    {
        $places = Place::paginate(15);
        $places_total = count(Place::all());

        return view('management.places.index', ['places' => $places, 'places_total' => $places_total]);
    }

    // Страница добавления нового места размещения
    public function create()
    {
        $types = Type::all();
        $properties = Property::all();
        $regions = Region::all();

        return view('management.places.create', ['types' => $types, 'properties' => $properties,'regions' => $regions]);
    }

    // Сохранение места размещения
    public function store(Request $request)
    {
        $request->validate([
            'enabled' => 'required|boolean',
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'type_id' => 'required|integer',
            'region_id' => 'required|integer',
            'slug' => 'required|string|max:100|unique:places',
            'image' => 'nullable|image',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ]);

        $place = Place::create($request->only([
            'enabled',
            'name',
            'title',
            'description',
            'type_id',
            'region_id',
            'slug',
            'lat',
            'lng'
        ]));

        $place->properties()->sync($request->property); // Синхронизация чекбоксов с Pivot таблицей

        // Добавляем изображение в хранилище и таблицу
        if($file = $request->hasFile('image')) {
            $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $image = new Image(); // Новая запись в таблицу с изображениями
            $image->path = $file_path; // Передаем путь
            $image->imageable_id = $place->id; // Полиморфное отношение
            $image->imageable_type = 'App\Place'; // Полиморфное отношение
            $image->save();
        }

        return redirect(url('management/places'))->with('success', 'Новое место успешно добавлено!');
    }

    // Страница редактирования места размещения
    public function edit($id)
    {
        $places = Place::all()->where('id', $id);
        $properties = Property::all();
        $regions = Region::all();
        $types = Type::all();

        return view('management.places.edit', ['places' => $places, 'properties' => $properties, 'regions' => $regions, 'types' => $types]);
    }

    // Обновление места размещения
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous' => 'string',
            'enabled' => 'required|boolean',
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'type_id' => 'required|integer',
            'region_id' => 'required|integer',
            'slug' => 'required|string|max:100',
            'image' => 'nullable|image',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ]);

        $place = Place::find($id);

        $place->update($request->only([
            'enabled',
            'name',
            'title',
            'description',
            'type_id',
            'region_id',
            'slug',
            'lat',
            'lng'
        ]));

        $place->properties()->sync($request->property);

        // Если в запросе есть файл изображения
        if($file = $request->hasFile('image')) {
            // Пытаемся найти старую обложку в таблице
            $old_image = Image::where('imageable_id', $place->id)->where('imageable_type', 'App\Place')->first();

            if(!empty($old_image)) {
                // Удаляем ее файл из хранилища
                Storage::delete($old_image->path);

                // Сохраняем новый файл
                $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

                $old_image->path = $file_path; // Заменяем путь на новый
                $old_image->save();
            }
            else {
                $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

                $image = new Image(); // Новая запись в таблицу с изображениями
                $image->path = $file_path; // Передаем путь
                $image->imageable_id = $place->id; // Полиморфное отношение
                $image->imageable_type = 'App\Place'; // Полиморфное отношение
                $image->save();
            }

        }

        $previous = $request->previous;

        return redirect(url($previous))->with('success', 'Место успешно обновлено.');
    }

    // Удаление места размещения
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();

        // Ищем изображение, удаляем из хранилища и таблицы
        $image = Image::where('imageable_id', $place->id)->where('imageable_type', 'App\Place')->first();
        Storage::delete($image->path);
        $image->delete();

        return redirect(url('management/places'))->with('success', 'Место успешно удалено.');
    }
}
