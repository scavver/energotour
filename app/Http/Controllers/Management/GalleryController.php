<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;
use App\Image;
use App\Place;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Список всех галерей
    public function index()
    {
        $galleries = Gallery::paginate(15);

        return view('management.galleries.index', ['galleries' => $galleries]);
    }

    // Страница добавления новой галереи
    public function create()
    {
        $places = Place::all();

        return view('management.galleries.create', ['places' => $places]);
    }

    // Добавление новой галереи
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'place_id' => 'nullable|integer',
            'is_main' => 'boolean',
            'is_room' => 'boolean'
        ]);

        $gallery = Gallery::create($request->all());

        return redirect(route('galleries.index'))->with('success', 'Пустая галерея создана.');
    }

    // Страница редактирования галереи
    public function edit($id)
    {
        $galleries = Gallery::all()->where('id', $id);
        $images = Image::all()->where('gallery_id', $id);
        $places = Place::all();

        return view('management.galleries.edit', ['galleries' => $galleries, 'images' => $images, 'places' => $places]);
    }

    // Обновление галереи
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'place_id' => 'nullable|integer',
            'is_main' => 'boolean',
            'is_room' => 'boolean'
        ]);

        $gallery = Gallery::find($id);

        $gallery->update($request->all());

        return redirect(route('galleries.index'))->with('success', 'Галерея обновлена.');
    }

    // Удаление галереи
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $images = Image::all()->where('gallery_id', $id);

        foreach ($images as $image) {
            Storage::delete($image->path);
            Storage::delete($image->path_compressed);
            Storage::delete($image->path_sm);
        }

        $gallery->delete();

        return redirect(route('galleries.index'))->with('success', 'Удалена галерея, все ее изображения и их миниатюры.');
    }
}
