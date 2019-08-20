<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    // Список всех услуг и удобств
    public function index()
    {
        $properties = Property::paginate(15);

        return view('management.properties.index', ['properties' => $properties]);
    }

    // Страница добавления новой услуги или удобства
    public function create()
    {
        return view('management.properties.create');
    }

    // Сохранение услуги или удобства
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:100', 'class' => 'required|string|max:50']);

        $property = Property::create($request->all());

        return redirect(route('properties.index'))->with('success', 'Новая характеристика мест добавлена.');
    }

    // Страница редактирования услуги или удобства
    public function edit($id)
    {
        $properties = Property::all()->where('id', $id);

        return view('management.properties.edit', ['properties' => $properties]);
    }

    // Обновление услуги или удобства
    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:100', 'class' => 'required|string|max:50']);

        $property = Property::find($id);

        $property->update($request->all());

        return redirect(route('properties.index'))->with('success', 'Характеристика мест обновлена.');
    }

    // Удаление услуги или удобства
    public function destroy($id)
    {
        $property = Property::find($id);

        $property->delete();

        return redirect(route('properties.index'))->with('success', 'Характеристика мест удалена.');
    }
}
