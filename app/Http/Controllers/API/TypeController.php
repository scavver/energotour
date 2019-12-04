<?php

namespace App\Http\Controllers\API;

use App\Hotel;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function get_types()
    {
        $types = Type::all();

        // Возвращаем JSON массив всех типов
        return $types;
    }

    public function get_hotel_ids($id)
    {
        // Передаем идентификатор типа
        $hotels = Hotel::where('type_id', $id)->select('id')->get();

        // Возвращаем JSON массив идентификаторов объектов размещения определенного типа
        return $hotels;
    }
}
