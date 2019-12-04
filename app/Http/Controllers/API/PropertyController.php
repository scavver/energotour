<?php

namespace App\Http\Controllers\API;

use App\Hotel;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function get_properties()
    {
        $properties = Property::all();

        // Возвращаем JSON массив всех услуг и удобств
        return $properties;
    }

    public function get_hotel_ids($id)
    {
        $hotels = Hotel::whereHas('properties', function($q) use($id) { $q->where('id', $id); })->select('id')->get();

        // Возвращаем JSON массив идентификаторов мест
        return $hotels;
    }
}
