<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Treatment;
use App\Hotel;

class TreatmentController extends Controller
{
    // Список всех записей лечения
    public function index()
    {
        $treatment_list = Treatment::paginate(15);

        return view('management.treatment.index', ['treatment_list' => $treatment_list]);
    }

    // Страница добавления лечения
    public function create()
    {
        $hotels = Hotel::all();

        return view('management.treatment.create', ['hotels' => $hotels]);
    }

    // Сохранение записи с лечением
    public function store(Request $request)
    {
        // Валидация данных из запроса
        $request->validate([
            'hotel_id' => 'required|integer',
            'profiles' => 'nullable|string',
            'types'    => 'nullable|string',
        ]);

        // Сохраняем только определенные прошедшие валидацию данные
        $treatment = Treatment::create($request->only([
            'hotel_id',
            'profiles',
            'types',
        ]));

        // Редирект с сообщением
        return redirect(url('management/treatment'))->with('success', '🎉 Лечение добавлено');
    }

    // Страница редактирования лечения
    public function edit($id)
    {
        $treatment = Treatment::find($id);
        $hotels = Hotel::all();

        return view('management.treatment.edit', ['treatment' => $treatment, 'hotels' => $hotels]);
    }

    // Обновление лечения
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous' => 'string',
            'hotel_id' => 'required|integer',
            'profiles' => 'nullable|string',
            'types'    => 'nullable|string',
        ]);

        $treatment = Treatment::find($id);

        $treatment->update($request->only([
            'hotel_id',
            'profiles',
            'types',
        ]));

        $previous = $request->previous;

        return redirect(url($previous))->with('success', '🎊 Лечение обновлено');
    }

    // Удаление лечения
    public function destroy($id)
    {
        $treatment = Treatment::find($id);

        $treatment->delete();

        return redirect(route('treatment.index'))->with('success', '🧹 Лечение удалено');
    }
}
