<?php

namespace App\Http\Controllers\Management;

use App\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Landmark;
use App\Region;
use App\Image;

class LandmarkController extends Controller
{
    // Все достопримечатльности
    public function index()
    {
        $landmarks = Landmark::paginate(15);

        return view('management.landmarks.index', ['landmarks' => $landmarks]);
    }

    // Добавить новую достопримечательность
    public function create()
    {
        $regions = Region::all();
        $galleries = Gallery::all();

        return view('management.landmarks.create', ['regions' => $regions, 'galleries' => $galleries]);
    }

    // Сохранить новую достопримечательность
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'content' => 'required|string',
            'slug' => 'required|string|max:100|unique:landmarks',
            'region_id' => 'required|integer',
            'image' => 'nullable|image',
            'gallery' => 'nullable|integer',
        ]);

        $landmark = Landmark::create(
            array_merge(
                $request->only([
                    'title',
                    'description',
                    'content',
                    'slug',
                    'region_id',
                ]),
                ['user_id' => $user->id]
            )
        );

        if(is_null($request->gallery)) {
            /*$gallery = Gallery::find($landmark->gallery->id);
            $gallery->type_id = 0;
            $gallery->type = NULL;
            $gallery->save();*/
        } elseif (is_int((int) $request->gallery)) {
            $gallery = Gallery::find($request->gallery);
            $gallery->type_id = $landmark->id;
            $gallery->type = 'App\Landmark';
            $gallery->save();
        }

        // Добавляем изображение в хранилище и таблицу
        if($file = $request->hasFile('image')) {
            $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $image = new Image(); // Новая запись в таблицу с изображениями
            $image->path = $file_path; // Передаем путь
            $image->imageable_id = $landmark->id; // Полиморфное отношение
            $image->imageable_type = 'App\Landmark'; // Полиморфное отношение
            $image->save();
        }

        return redirect(route('landmarks.index'))->with('success', 'Достопримечательность добавлена 👍');
    }

    // Редактировать достопримечательность
    public function edit($id)
    {
        $landmark = Landmark::find($id);
        $galleries = Gallery::all();
        $regions = Region::all();

        return view('management.landmarks.edit', ['landmark' => $landmark, 'galleries' => $galleries, 'regions' => $regions]);
    }

    // Обновить достопримечательность
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'content' => 'required|string',
            'slug' => 'required|string|max:100',
            'region_id' => 'required|integer',
            'image' => 'nullable|image',
            'gallery' => 'nullable|integer',
        ]);

        $landmark = Landmark::find($id); // Определяем достопримечательность с которой работаем

        $landmark->update($request->only([
            'title',
            'description',
            'content',
            'slug',
            'region_id',
        ]));

        if(is_null($request->gallery)) {
            /*$gallery = Gallery::find($landmark->gallery->id);
            $gallery->type_id = 0;
            $gallery->type = NULL;
            $gallery->save();*/
        } elseif (is_int((int) $request->gallery)) {
            $gallery = Gallery::find($request->gallery);
            $gallery->type_id = $landmark->id;
            $gallery->type = 'App\Landmark';
            $gallery->save();
        }

        // Если в запросе есть файл изображения
        if($file = $request->hasFile('image')) {
            // Пытаемся найти старую обложку в таблице
            $old_image = Image::where('imageable_id', $landmark->id)->where('imageable_type', 'App\Landmark')->first();

            if (!empty($old_image)) {
                // Удаляем ее файл из хранилища
                Storage::delete($old_image->path);

                // Сохраняем новый файл
                $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

                $old_image->path = $file_path; // Заменяем путь на новый
                $old_image->save();
            } else {
                $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

                $image = new Image(); // Новая запись в таблицу с изображениями
                $image->path = $file_path; // Передаем путь
                $image->imageable_id = $landmark->id; // Полиморфное отношение
                $image->imageable_type = 'App\Landmark'; // Полиморфное отношение
                $image->save();
            }
        }

        return redirect(route('landmarks.index'))->with('success', 'Достопримечательность обновлена 👌');
    }

    // Удалить достопримечательность
    public function destroy($id)
    {
        $landmark = Landmark::find($id);
        $landmark->delete();

        // Ищем изображение, удаляем из хранилища и таблицы
        $image = Image::where('imageable_id', $landmark->id)->where('imageable_type', 'App\Landmark')->first();
        Storage::delete($image->path);
        $image->delete();

        return redirect(route('landmarks.index'))->with('success', 'Достопримечательность удалена 🤙');
    }
}
