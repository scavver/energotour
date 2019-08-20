<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CoordCollection;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoordController extends Controller
{
    public function getAllCoords()
    {
        // Получаем коллекцию всех объектов размещения
        $places = Place::all();

        // Используем Laravel API Resources для формирования JSON массива
        return new CoordCollection($places);
    }

    public function getPlaceCoords($slug)
    {
        // Передаем slug объекта размещения /places/[oreanda-resort]
        $places = Place::where('slug', $slug)->select('name', 'slug', 'lat', 'lng')->get();

        // Используем Laravel API Resources для формирования JSON массива
        return new CoordCollection($places);
    }
}
