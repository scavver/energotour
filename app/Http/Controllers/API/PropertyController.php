<?php

namespace App\Http\Controllers\API;

use App\Place;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function getAllProperties()
    {
        $properties = Property::all();

        // Возвращаем JSON массив всех услуг и удобств
        return $properties;
    }

    public function getPlaceIds($id)
    {
        $places = Place::whereHas('properties', function($q) use($id) { $q->where('id', $id); })->select('id')->get();

        // Возвращаем JSON массив идентификаторов мест
        return $places;
    }
}
