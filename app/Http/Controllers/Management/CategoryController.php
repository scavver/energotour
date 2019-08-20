<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    // Список всех регионов
    public function index()
    {
        $categories = Category::paginate(12);

        return view('management.categories.index', ['categories' => $categories]);
    }

    // Страница добавления нового региона
    public function create()
    {
        return view('management.categories.create');
    }

    // Сохранение нового региона
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'cover' => 'nullable|image'
        ]);

        $category = Category::create($request->only([
            'name'
        ]));

        if($cover = $request->hasFile('cover')) {
            // TODO: Delete previous cover
            $cover = $request->cover->store('images'); // Сохраняем картинку из запроса

            $category->cover = $cover; // Указываем название сохраненной картинки в запись места
            $category->save();
        }

        return redirect(route('categories.index'))->with('success', 'Новая категория мест добавлена.');
    }

    // Страница редактирования региона
    public function edit($id)
    {
        $categories = Category::all()->where('id', $id);

        return view('management.categories.edit', ['categories' => $categories]);
    }

    // Обновление региона
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'cover' => 'nullable|image',
        ]);

        $category = Category::find($id);

        $category->update($request->only([
            'name'
        ]));

        if($cover = $request->hasFile('cover')) {
            // TODO: Delete previous cover
            $cover = $request->cover->store('images');

            $category->cover = $cover;
            $category->save();
        }

        return redirect(route('categories.index'))->with('success', 'Категория мест обновлена.');
    }

    // Удаление региона
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect(route('categories.index'))->with('success', 'Категория мест удалена.');
    }
}
