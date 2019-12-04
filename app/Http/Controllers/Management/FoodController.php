<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Food;

class FoodController extends Controller
{
    // Список всех записей питания
    public function index()
    {
        $food_list = Food::paginate(15);

        return view('management.food.index', ['food_list' => $food_list]);
    }

    // Страница добавления питания
    public function create()
    {
        $hotels = Hotel::all();

        return view('management.food.create', ['hotels' => $hotels]);
    }

    // Сохранение записи с питанием
    public function store(Request $request)
    {
        // Валидация данных из запроса
        $request->validate([
            'hotel_id' => 'required|integer',
            'included' => 'required|string',
            'extra'    => 'nullable|string',
        ]);

        // Сохраняем только определенные прошедшие валидацию данные
        $food = Food::create($request->only([
            'hotel_id',
            'included',
            'extra',
        ]));

        // Редирект с сообщением
        return redirect(url('management/food'))->with('success', '🎉 Питание добавлено');
    }

    // Страница редактирования питания
    public function edit($id)
    {
        $food = Food::find($id);
        $hotels = Hotel::all();

        return view('management.food.edit', ['food' => $food, 'hotels' => $hotels]);
    }

    // Обновление питания
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous' => 'string',
            'hotel_id' => 'required|integer',
            'included' => 'required|string',
            'extra'    => 'nullable|string',
        ]);

        $food = Food::find($id);

        $food->update($request->only([
            'hotel_id',
            'included',
            'extra',
        ]));

        $previous = $request->previous;

        return redirect(url($previous))->with('success', '🎊 Питание обновлено');
    }

    // Удаление питания
    public function destroy($id)
    {
        $food = Food::find($id);

        $food->delete();

        return redirect(route('food.index'))->with('success', '🧹 Питание удалено');
    }
}
