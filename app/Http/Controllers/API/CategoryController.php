<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::all();

        // Возвращаем JSON массив всех регионов (категорий)
        return $categories;
    }

    public function getPlaceIds($id)
    {
        // Передаем идентификатор региона (категории)
        $places = Place::where('category_id', $id)->select('id')->get();

        // Возвращаем JSON массив идентификаторов объектов размещения в определенном регионе (категории)
        return $places;
    }
}
