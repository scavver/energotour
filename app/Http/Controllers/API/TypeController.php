<?php

namespace App\Http\Controllers\API;

use App\Place;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function getAllTypes()
    {
        $types = Type::all();

        // Возвращаем JSON массив всех типов
        return $types;
    }

    public function getPlaceIds($id)
    {
        // Передаем идентификатор типа
        $places = Place::where('type_id', $id)->select('id')->get();

        // Возвращаем JSON массив идентификаторов объектов размещения определенного типа
        return $places;
    }
}
