<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PlacesQueryString;
use App\Http\Resources\PlaceCollection;
use App\Http\Controllers\Controller;
use App\Place;

class PlaceController extends Controller
{
    public function get_places(PlacesQueryString $request)
    {
        // Places Query String
        if($request->has(['t', 'r', 'p'])) {
           // Присваиваем провалидированные данные из запроса одноименным переменным
           $type        = $request->query('t');     // Nullable|Integer
           $region      = $request->query('r');     // Nullable|Integer
           $properties  = $request->query('p');     // Nullable|String

           // Разбиваем строку `checkedProperties` на массив, фильтруем оставляя только цифры
           if (is_string($properties)) {
               $properties = explode(",", $properties);
               $properties = array_filter($properties, "is_numeric"); // TODO: Изменить callback т.к. numeric пропускает числа с плавающей точкой
           }

           // Строим запрос на основе имеющихся, обработанных данных из $request
           $places = Place::with('properties')->with('image')
               ->when($type, function ($query, $type) {
                   return $query->where('type_id', $type);
               })
               ->when($region, function ($query, $region) {
                   return $query->where('region_id', $region);
               })
               ->when($properties, function ($query, $properties) {
                   return $query->whereHas('properties', function ($query) use ($properties) {
                       $query->whereIn('property_id', $properties);
                   }, '>=', count($properties)); // Строгое соответствие всем выбранным параметрам
               })
               ->get();

           /**
            * Возвращаем коллекцию объектов в кастомном JSON шаблоне
            * `app/Http/Resources/Place.php` (API Resources)
            */
           return new PlaceCollection($places);
       }

        /**
         * В случае если URL не содержит Query String (/places)
         * возвращаем коллекцию всех объектов в кастомном JSON шаблоне
         * `app/Http/Resources/Place.php` (API Resources)
         */
        $places = Place::all();

        return new PlaceCollection($places);
    }
}
