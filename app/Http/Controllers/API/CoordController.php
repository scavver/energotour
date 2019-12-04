<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CoordCollection;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoordController extends Controller
{
    public function get_coords()
    {
        // Получаем коллекцию всех объектов размещения
        $hotels = Hotel::all();

        // Используем Laravel API Resources для формирования JSON массива
        return new CoordCollection($hotels);
    }

    public function get_hotel_coords($slug)
    {
        // Передаем slug объекта размещения /hotels/[oreanda-resort]
        $hotels = Hotel::where('slug', $slug)->select('name', 'slug', 'lat', 'lng')->get();

        // Используем Laravel API Resources для формирования JSON массива
        return new CoordCollection($hotels);
    }
}
