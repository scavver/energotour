<?php

namespace App\Http\Controllers\Management;

use App\Cover;
use App\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePlace;
use App\Http\Requests\StorePlace;
use App\Category;
use App\Place;
use App\Property;
use App\Type;

class PlaceController extends Controller
{
    // Список всех мест размещения
    public function index()
    {
        $places = Place::paginate(15);

        return view('management.places.index', ['places' => $places]);
    }

    // Страница добавления нового места размещения
    public function create()
    {
        $types = Type::all();
        $properties = Property::all();
        $categories = Category::all();

        return view('management.places.create', ['types' => $types, 'properties' => $properties,'categories' => $categories]);
    }

    // Сохранение места размещения
    public function store(StorePlace $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'type_id' => 'required|integer',
            'category_id' => 'required|integer',
            'slug' => 'required|string|max:100|unique:places',
            'content' => 'required|string',
            'cover' => 'nullable|image',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ]);

        $place = Place::create($request->only([
            'name',
            'title',
            'description',
            'type_id',
            'category_id',
            'slug',
            'content',
            'lat',
            'lng'
        ]));

        $place->properties()->sync($request->property); // Синхронизация чекбоксов с Pivot таблицей

        if($cover = $request->hasFile('cover')) {
            $cover = $request->cover->store('covers');

            $id = $place->id;

            $image = new Cover();

            $image->path = $cover;
            $image->place_id = $id;

            $image->save();
        }

        return redirect(url('management/places'))->with('success', 'Новое место успешно добавлено!');
    }

    // Страница редактирования места размещения
    public function edit($id)
    {
        $places = Place::all()->where('id', $id);
        $properties = Property::all();
        $categories = Category::all();
        $types = Type::all();

        return view('management.places.edit', ['places' => $places, 'properties' => $properties, 'categories' => $categories, 'types' => $types]);
    }

    // Обновление места размещения
    public function update(UpdatePlace $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'type_id' => 'required|integer',
            'category_id' => 'required|integer',
            'slug' => 'required|string|max:100',
            'content' => 'required|string',
            'cover' => 'nullable|image',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ]);

        $place = Place::find($id);

        $place->update($request->only([
            'name',
            'title',
            'description',
            'type_id',
            'category_id',
            'slug',
            'content',
            'lat',
            'lng'
        ]));

        $place->properties()->sync($request->property);

        // Если в запросе есть файл обложки
        if($cover = $request->hasFile('cover')) {
            // Находим старую обложку в таблице
            $oldCover = Cover::where('place_id', $id)->first();
            // Удаляем ее файл из хранилища
            Storage::delete($oldCover->path);

            // Сохраняем новый файл
            $newCover = $request->cover->store('covers');

            // Обновляем путь к файлу в таблице
            $oldCover->update(['path' => $newCover]);
        }

        return redirect(url('management/places'))->with('success', 'Место успешно обновлено.');
    }

    // Удаление места размещения
    public function destroy($id)
    {
        $place = Place::find($id);

        $place->delete();

        return redirect(url('management/places'))->with('success', 'Место успешно удалено.');
    }
}
