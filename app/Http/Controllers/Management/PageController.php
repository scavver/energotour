<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    // Шаблон "Страницы"
    public function index()
    {
        $pages = Page::paginate(15);

        return view('management.pages.index', ['pages' => $pages]);
    }

    // Шаблон "Добавить новую страницу"
    public function create()
    {
        return view('management.pages.create');
    }

    // Сохранение страницы
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'content' => 'required|string',
            'slug' => 'required|string|max:100|unique:pages'
        ]);

        $page = Page::create($request->only([
            'title',
            'description',
            'content',
            'slug'
        ]));

        return redirect(route('pages.index'))->with('success', '🎉 Страница добавлена');
    }

    // Шаблон "Редактировать страницу"
    public function edit($id)
    {
        $page = Page::find($id);

        return view('management.pages.edit', ['page' => $page]);
    }

    // Обновление страницы
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:155',
            'content' => 'required|string',
            'slug' => 'required|string|max:100'
        ]);

        $page = Page::find($id);

        $page->update($request->only([
            'title',
            'description',
            'content',
            'slug'
        ]));

        return redirect(route('pages.index'))->with('success', '🎊 Страница обновлена');
    }

    // Удаление страницы
    public function destroy($id)
    {
        $page = Page::find($id);

        $page->delete();

        return redirect(route('pages.index'))->with('success', '🧹 Страница удалена');
    }
}
