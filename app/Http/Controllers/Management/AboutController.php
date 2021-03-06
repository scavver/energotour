<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\About;

class AboutController extends Controller
{
    // Список всех записей описаний
    public function index()
    {
        $about_list = About::paginate(15);

        return view('management.about.index', ['about_list' => $about_list]);
    }

    // Страница добавления нового описания
    public function create()
    {
        $hotels = Hotel::all();

        return view('management.about.create', ['hotels' => $hotels]);
    }

    // Сохранение нового описания
    public function store(Request $request)
    {
        // Валидация данных из запроса
        $request->validate([
            'hotel_id'            => 'required|integer',
            'description'         => 'nullable|string',
            'rules_of_settlement' => 'nullable|string',
            'included_services'   => 'nullable|string',
            'address'             => 'required|string',
            'territory'           => 'nullable|string',
            'reconstruction'      => 'nullable|string',
            'children'            => 'nullable|string',
        ]);

        // Сохраняем только определенные прошедшие валидацию данные
        $about = About::create($request->only([
            'hotel_id',
            'description',
            'rules_of_settlement',
            'included_services',
            'address',
            'territory',
            'reconstruction',
            'children',
        ]));

        // Редирект с сообщением
        return redirect(url('management/about'))->with('success', '🎉 Описание добавлено');
    }

    // Страница редактирования описания
    public function edit($id)
    {
        $about = About::find($id);
        $hotels = Hotel::all();

        return view('management.about.edit', ['about' => $about, 'hotels' => $hotels]);
    }

    // Обновление описания
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous'            => 'string',
            'hotel_id'            => 'required|integer',
            'description'         => 'nullable|string',
            'rules_of_settlement' => 'nullable|string',
            'included_services'   => 'nullable|string',
            'address'             => 'required|string',
            'territory'           => 'nullable|string',
            'reconstruction'      => 'nullable|string',
            'children'            => 'nullable|string',
        ]);

        $about = About::find($id);

        $about->update($request->only([
            'hotel_id',
            'description',
            'rules_of_settlement',
            'included_services',
            'address',
            'territory',
            'reconstruction',
            'children',
        ]));

        $previous = $request->previous;

        return redirect(url($previous))->with('success', '🎊 Описание обновлено');
    }

    // Удаление описания
    public function destroy($id)
    {
        $about = About::find($id);

        $about->delete();

        return redirect(route('about.index'))->with('success', '🧹 Описание удалено');
    }
}
