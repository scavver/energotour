<?php

namespace App\Http\Controllers\API;

use App\Region;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function get_regions()
    {
        $regions = Region::all();

        // Возвращаем JSON массив всех регионов
        return $regions;
    }

    public function get_places_ids($id)
    {
        // Передаем идентификатор региона
        $places = Place::where('region_id', $id)->select('id')->get();

        // Возвращаем JSON массив идентификаторов объектов размещения в определенном регионе
        return $places;
    }
}
