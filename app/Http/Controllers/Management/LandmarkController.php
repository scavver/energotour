<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Landmark;
use Illuminate\Support\Facades\Storage;

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
        $categories = Category::all();

        return view('management.landmarks.create', ['categories' => $categories]);
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
            'category_id' => 'required|integer',
            'cover' => 'nullable|image',
        ]);

        if($cover = $request->hasFile('cover')) {
            $cover_path = $request->cover->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $image = new Image(); // Новая запись в таблицу с изображениями
            $image->path = $cover_path; // Передаем путь
            $image->save();
        }

        $landmark = new Landmark();

        $landmark->title = $request->title;
        $landmark->description = $request->description;
        $landmark->content = $request->content;
        $landmark->slug = $request->slug;
        $landmark->category_id = $request->category_id;
        $landmark->user_id = $user->id;
        if(!empty($image)) {
            $landmark->cover_id = $image->id;
        }

        $landmark->save();

        return redirect(route('landmarks.index'))->with('success', 'Достопримечательность добавлена 👍');
    }

    // Редактировать достопримечательность
    public function edit($id)
    {
        $landmark = Landmark::find($id);
        $categories = Category::all();

        return view('management.landmarks.edit', ['landmark' => $landmark, 'categories' => $categories]);
    }

    // Обновить достопримечательность
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'content' => 'required|string',
            'slug' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'cover' => 'nullable|image',
        ]);

        $landmark = Landmark::find($id); // Определяем достопримечательность с которой работаем

        // Если в запросе есть файл обложки
        if($cover = $request->hasFile('cover')) {
            // Находим старую обложку в таблице
            $oldCover = Image::where('id', $landmark->cover_id)->first();
            // Удаляем ее файл из хранилища
            Storage::delete($oldCover->path);

            // Сохраняем новый файл
            $cover_path = $request->cover->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $oldCover->path = $cover_path; // Заменяем путь на новый
            $oldCover->save();
        }

        $landmark->title = $request->title;
        $landmark->description = $request->description;
        $landmark->content = $request->content;
        $landmark->slug = $request->slug;
        $landmark->category_id = $request->category_id;
        if(!empty($image)) {
            $landmark->cover_id = $image->id;
        }

        $landmark->save(); // Сохраняем изменения

        return redirect(route('landmarks.index'))->with('success', 'Достопримечательность обновлена 👌');
    }

    // Удалить достопримечательность
    public function destroy($id)
    {
        $landmark = Landmark::find($id);

        $landmark->delete();

        return redirect(route('landmarks.index'))->with('success', 'Достопримечательность удалена 🤙');
    }
}
