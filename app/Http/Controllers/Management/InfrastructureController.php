<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Infrastructure;
use App\Place;

class InfrastructureController extends Controller
{
    // Список всех записей инфраструктуры
    public function index()
    {
        $infrastructure_list = Infrastructure::paginate(15);

        return view('management.infrastructure.index', ['infrastructure_list' => $infrastructure_list]);
    }

    // Страница добавления инфраструктуры
    public function create()
    {
        $places = Place::all();

        return view('management.infrastructure.create', ['places' => $places]);
    }

    // Сохранение записи с инфраструктурой
    public function store(Request $request)
    {
        // Валидация данных из запроса
        $request->validate([
            'place_id'       => 'required|integer',
            'pool'           => 'nullable|string',
            'beach'          => 'nullable|string',
            'entertainments' => 'nullable|string',
            'sport'          => 'nullable|string',
            'wi_fi'          => 'nullable|string',
            'parking'        => 'nullable|string',
            'extra'          => 'nullable|string',
        ]);

        // Сохраняем только определенные прошедшие валидацию данные
        $infrastructure = Infrastructure::create($request->only([
            'place_id',
            'pool',
            'beach',
            'entertainments',
            'sport',
            'wi_fi',
            'parking',
            'extra',
        ]));

        // Редирект с сообщением
        return redirect(url('management/infrastructure'))->with('success', '🎉 Инфраструктура добавлена');
    }

    // Страница редактирования инфраструктуры
    public function edit($id)
    {
        $infrastructure = Infrastructure::find($id);
        $places = Place::all();

        return view('management.infrastructure.edit', ['infrastructure' => $infrastructure, 'places' => $places]);
    }

    // Обновление инфраструктуры
    public function update(Request $request, $id)
    {
        $request->validate([
            'place_id'       => 'required|integer',
            'pool'           => 'nullable|string',
            'beach'          => 'nullable|string',
            'entertainments' => 'nullable|string',
            'sport'          => 'nullable|string',
            'wi_fi'          => 'nullable|string',
            'parking'        => 'nullable|string',
            'extra'          => 'nullable|string',
        ]);

        $infrastructure = Infrastructure::find($id);

        $infrastructure->update($request->only([
            'place_id',
            'pool',
            'beach',
            'entertainments',
            'sport',
            'wi_fi',
            'parking',
            'extra',
        ]));

        return redirect(route('infrastructure.index'))->with('success', '🎊 Инфраструктура обновлена');
    }

    // Удаление инфраструктуры
    public function destroy($id)
    {
        $infrastructure = Infrastructure::find($id);

        $infrastructure->delete();

        return redirect(route('infrastructure.index'))->with('success', '🧹 Инфраструктура удалена');
    }
}
