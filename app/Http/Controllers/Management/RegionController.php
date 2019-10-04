<?php

namespace App\Http\Controllers\Management;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;
use App\Image;

class RegionController extends Controller
{
    // Список всех регионов
    public function index()
    {
        $regions = Region::paginate(10);

        return view('management.regions.index', ['regions' => $regions]);
    }

    // Страница добавления нового региона
    public function create()
    {
        return view('management.regions.create');
    }

    // Сохранение нового региона
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'image' => 'nullable|image'
        ]);

        $region = Region::create($request->only([
            'name'
        ]));

        // Добавляем изображение в хранилище и таблицу
        if($file = $request->hasFile('image')) {
            $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $image = new Image(); // Новая запись в таблицу с изображениями
            $image->path = $file_path; // Передаем путь
            $image->imageable_id = $region->id; // Полиморфное отношение
            $image->imageable_type = 'App\Region'; // Полиморфное отношение
            $image->save();
        }

        return redirect(route('regions.index'))->with('success', '😐 Новый регион добавлен.');
    }

    // Страница редактирования региона
    public function edit($id)
    {
        $regions = Region::all()->where('id', $id);

        return view('management.regions.edit', ['regions' => $regions]);
    }

    // Обновление региона
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'image' => 'nullable|image',
        ]);

        $region = Region::find($id);

        $region->update($request->only([
            'name'
        ]));

        // Если в запросе есть файл изображения
        if($file = $request->hasFile('image')) {
            // Пытаемся найти старую обложку в таблице
            $old_image = Image::where('imageable_id', $region->id)->where('imageable_type', 'App\Region')->first();

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
                $image->imageable_id = $region->id; // Полиморфное отношение
                $image->imageable_type = 'App\Region'; // Полиморфное отношение
                $image->save();
            }

        }

        return redirect(route('regions.index'))->with('success', '🥴 Регион обновлен.');
    }

    // Удаление региона
    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();

        // Ищем изображение, удаляем из хранилища и таблицы
        $image = Image::where('imageable_id', $region->id)->where('imageable_type', 'App\Region')->first();
        Storage::delete($image->path);
        $image->delete();

        return redirect(route('regions.index'))->with('success', '👽 Регион удален.');
    }
}
