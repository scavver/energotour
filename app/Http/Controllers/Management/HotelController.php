<?php

namespace App\Http\Controllers\Management;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use App\Region;
use App\Hotel;
use App\Image;
use App\Type;

class HotelController extends Controller
{
    // Список всех мест размещения
    public function index()
    {
        $hotels = Hotel::paginate(15);
        $hotels_total = count(Hotel::all());

        return view('management.hotels.index', ['hotels' => $hotels, 'hotels_total' => $hotels_total]);
    }

    // Страница добавления нового места размещения
    public function create()
    {
        $types = Type::all();
        $properties = Property::all();
        $regions = Region::all();

        return view('management.hotels.create', ['types' => $types, 'properties' => $properties,'regions' => $regions]);
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
            'slug' => 'required|string|max:100|unique:hotels',
            'image' => 'nullable|image',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ]);

        $hotel = Hotel::create($request->only([
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

        $hotel->properties()->sync($request->property); // Синхронизация чекбоксов с Pivot таблицей

        // Добавляем изображение в хранилище и таблицу
        if($file = $request->hasFile('image')) {
            $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $image = new Image(); // Новая запись в таблицу с изображениями
            $image->path = $file_path; // Передаем путь
            $image->imageable_id = $hotel->id; // Полиморфное отношение
            $image->imageable_type = 'App\Hotel'; // Полиморфное отношение
            $image->save();
        }

        return redirect(url('management/hotels'))->with('success', 'Новое место успешно добавлено!');
    }

    // Страница редактирования места размещения
    public function edit($id)
    {
        $hotels = Hotel::all()->where('id', $id);
        $properties = Property::all();
        $regions = Region::all();
        $types = Type::all();

        return view('management.hotels.edit', ['hotels' => $hotels, 'properties' => $properties, 'regions' => $regions, 'types' => $types]);
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

        $hotel = Hotel::find($id);

        $hotel->update($request->only([
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

        $hotel->properties()->sync($request->property);

        // Если в запросе есть файл изображения
        if($file = $request->hasFile('image')) {
            // Пытаемся найти старую обложку в таблице
            $old_image = Image::where('imageable_id', $hotel->id)->where('imageable_type', 'App\Hotel')->first();

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
                $image->imageable_id = $hotel->id; // Полиморфное отношение
                $image->imageable_type = 'App\Hotel'; // Полиморфное отношение
                $image->save();
            }

        }

        $previous = $request->previous;

        return redirect(url($previous))->with('success', 'Место успешно обновлено.');
    }

    // Удаление места размещения
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        // Ищем изображение, удаляем из хранилища и таблицы
        $image = Image::where('imageable_id', $hotel->id)->where('imageable_type', 'App\Hotel')->first();
        Storage::delete($image->path);
        $image->delete();

        return redirect(url('management/hotels'))->with('success', 'Место успешно удалено.');
    }
}
