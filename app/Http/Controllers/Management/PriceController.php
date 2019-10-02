<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use App\Place;
use App\Price;
use Illuminate\Support\Facades\Storage;

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
        // Валидация запроса
        $request->validate([
            'min_price' => 'required|integer',
            'place_id' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        // Добавляем запись в таблицу `prices`
        $price = Price::create($request->only([
            'min_price',
            'place_id'
        ]));

        // Добавляем изображение в хранилище и таблицу
        if($file = $request->hasFile('image')) {
            $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $image = new Image(); // Новая запись в таблицу с изображениями
            $image->path = $file_path; // Передаем путь
            $image->imageable_id = $price->id; // Полиморфное отношение
            $image->imageable_type = 'App\Price'; // Полиморфное отношение
            $image->save();
        }

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
            'place_id' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        $price = Price::find($id);

        $price->update($request->only([
            'min_price',
            'place_id'
        ]));

        // Если в запросе есть файл изображения
        if($file = $request->hasFile('image')) {
            // Находим старую обложку в таблице
            $old_image = Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first();
            // Удаляем ее файл из хранилища
            Storage::delete($old_image->path);

            // Сохраняем новый файл
            $file_path = $request->image->store('images'); // Сохраняем изображение в хранилище получаем в ответ путь

            $old_image->path = $file_path; // Заменяем путь на новый
            $old_image->save();
        }

        return redirect(route('prices.index'))->with('success', 'Цены обновлены.');
    }

    // Удаление прайса
    public function destroy($id)
    {
        // Ищем прайс в таблице и удаляем запись
        $price = Price::find($id);
        $price->delete();

        // Ищем изображение, удаляем из хранилища и таблицы
        $image = Image::where('imageable_id', $price->id)->where('imageable_type', 'App\Price')->first();
        Storage::delete($image->path);
        $image->delete();

        return redirect(route('prices.index'))->with('success', 'Цены удалены.');
    }
}
