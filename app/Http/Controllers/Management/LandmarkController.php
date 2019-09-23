<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Landmark;

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
        ]);

        $landmark = Landmark::create(
            array_merge(
                $request->only([
                'title',
                'description',
                'content',
                'slug',
                'category_id',
            ]),
            ['user_id' => $user->id]));

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
        ]);

        $landmark = Landmark::find($id);

        $landmark->update($request->only([
            'title',
            'description',
            'content',
            'slug',
            'category_id',
        ]));

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
