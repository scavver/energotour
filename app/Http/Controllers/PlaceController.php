<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Place;
use App\Room;

class PlaceController extends Controller
{
    // Страница всех мест размещения - "Санатории и отели"
    public function index()
    {
        // В шаблон встроен компонент AccommodationCatalogue.vue
        return view('public.places.index');
    }

    // Страница места размещения
    public function single($slug)
    {
        $place = Place::where('slug', $slug)->first();
        $rooms = Room::where('place_id', '=', $place->id)->get();

        if (empty($place)) {
            abort(404);
        }

        $slides = Gallery::where('place_id', $place->id)->where('is_main', '1')->first()->images;

        return view('public.places.single', ['place' => $place, 'slides' => $slides, 'rooms' => $rooms]);
    }
}
