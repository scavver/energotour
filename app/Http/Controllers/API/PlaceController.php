<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AccommodationCatalogueQueryString;
use App\Http\Resources\PlaceCollection;
use App\Http\Controllers\Controller;
use App\Place;

class PlaceController extends Controller
{
    public function getPlaces(AccommodationCatalogueQueryString $request)
    {
        /**
         * Ловим строку из запроса - `AccommodationCatalogue.vue` реактивно изменяет query string, роут - `/places`
         */
       if($request->has(['selectedType', 'selectedCategory', 'checkedProperties'])) {
           // Присваиваем провалидированные данные из запроса одноименным переменным
           $selectedType = $request->query('selectedType');             // Nullable|Integer
           $selectedCategory = $request->query('selectedCategory');     // Nullable|Integer
           $checkedProperties = $request->query('checkedProperties');   // Nullable|String

           // Разбиваем строку `checkedProperties` на массив, фильтруем оставляя только цифры
           if (is_string($checkedProperties)) {
               $checkedProperties = explode(",", $checkedProperties);
               $checkedProperties = array_filter($checkedProperties, "is_numeric"); // TODO: Изменить callback т.к. numeric пропускает числа с плавающей точкой
           }

           // Строим запрос на основе имеющихся, обработанных данных из $request
           $places = Place::with('properties')->with('image')
               ->when($selectedType, function ($query, $selectedType) {
                   return $query->where('type_id', $selectedType);
               })
               ->when($selectedCategory, function ($query, $selectedCategory) {
                   return $query->where('category_id', $selectedCategory);
               })
               ->when($checkedProperties, function ($query, $checkedProperties) {
                   return $query->whereHas('properties', function ($query) use ($checkedProperties) {
                       $query->whereIn('property_id', $checkedProperties);
                   }, '>=', count($checkedProperties)); // Строгое соответствие всем выбранным параметрам
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
