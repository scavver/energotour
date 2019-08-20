<?php
namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    // Список всех типов мест размещения
    public function index()
    {
        $types = Type::paginate(12);

        return view('management.types.index', ['types' => $types]);
    }

    // Страница добавления нового места размещения
    public function create()
    {
        return view('management.types.create');
    }

    // Сохранение места размещения
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);

        $type = Type::create($request->all());

        return redirect(route('types.index'))->with('success', 'Новый тип мест добавлен.');
    }

    // Страница редактирования места размещения
    public function edit($id)
    {
        $types = Type::all()->where('id', $id);

        return view('management.types.edit', ['types' => $types]);
    }

    // Обновление места размещения
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:100']);

        $type = Type::find($id);

        $type->update($request->all());

        return redirect(route('types.index'))->with('success', 'Тип мест обновлен.');
    }

    // Удаление места размещения
    public function destroy($id)
    {
        $type = Type::find($id);

        $type->delete();

        return redirect(route('types.index'))->with('success', 'Тип мест удален.');
    }
}
