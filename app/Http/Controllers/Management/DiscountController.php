<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Discount;
use App\Hotel;

class DiscountController extends Controller
{
    // Список всех скидок
    public function index()
    {
        $discounts = Discount::paginate(15);

        return view('management.discounts.index', ['discounts' => $discounts]);
    }

    // Страница добавления новых скидок
    public function create()
    {
        $hotels = Hotel::all();

        return view('management.discounts.create', ['hotels' => $hotels]);
    }

    // Сохранение новых скидок
    public function store(Request $request)
    {
        $request->validate([
            'max_discount' => 'required|integer',
            'content' => 'required|string',
            'hotel_id' => 'required|integer'
        ]);

        $discount = Discount::create($request->all());

        return redirect(route('discounts.index'))->with('success', 'Скидки добавлены!');
    }

    // Страница редактирования скидок
    public function edit($id)
    {
        $discounts = Discount::all()->where('id', $id);
        $hotels = Hotel::all();

        return view('management.discounts.edit', ['discounts' => $discounts, 'hotels' => $hotels]);
    }

    // Обновление скидок
    public function update(Request $request, $id)
    {
        $request->validate([
            'previous'      => 'string',
            'max_discount'  => 'required|integer',
            'content'       => 'required|string',
            'hotel_id'      => 'required|integer'
        ]);

        $discount = Discount::find($id);

        $discount->update($request->all());

        $previous = $request->previous;

        return redirect(url($previous))->with('success', 'Скидки обновлены.');
    }

    // Удаление скидок
    public function destroy($id)
    {
        $discount = Discount::find($id);

        $discount->delete();

        return redirect(route('discounts.index'))->with('success', 'Акции удалены.');
    }
}
