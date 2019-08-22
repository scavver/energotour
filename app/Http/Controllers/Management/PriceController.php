<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Price;

class PriceController extends Controller
{
    // Список всех прайсов
    public function index()
    {
        $prices = Price::paginate(15);

        return view('management.prices.index', ['prices' => $prices]);
    }

    // Страница добавления нового прайса
    public function create()
    {
        $places = Place::all();

        return view('management.prices.create', ['places' => $places]);
    }

    // Сохранение прайса
    public function store(Request $request)
    {
        $request->validate([
            'min_price' => 'required|integer',
            'content' => 'required|string',
            'place_id' => 'required|integer'
        ]);

        $price = Price::create($request->all());

        return redirect(route('prices.index'))->with('success', 'Цены добавлены!');
    }

    // Страница редактирования прайса
    public function edit($id)
    {
        $prices = Price::all()->where('id', $id);
        $places = Place::all();

        return view('management.prices.edit', ['prices' => $prices, 'places' => $places]);
    }

    // Обновление прайса
    public function update(Request $request, $id)
    {
        $request->validate([
            'min_price' => 'required|integer',
            'content' => 'required|string',
            'place_id' => 'required|integer'
        ]);

        $price = Price::find($id);

        $price->update($request->all());

        return redirect(route('prices.index'))->with('success', 'Цены обновлены.');
    }

    // Удаление прайса
    public function destroy($id)
    {
        $price = Price::find($id);

        $price->delete();

        return redirect(route('prices.index'))->with('success', 'Цены удалены.');
    }
}
