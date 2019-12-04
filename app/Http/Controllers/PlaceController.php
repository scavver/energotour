<?php

namespace App\Http\Controllers;

use App\Infrastructure;
use App\Treatment;
use App\Gallery;
use App\Place;
use App\Food;
use App\Room;

class PlaceController extends Controller
{
    // Страница всех мест размещения - "Санатории и отели"
    public function index()
    {
        // В шаблон встроен компонент Places.vue
        return view('public.places.index');
    }

    // Страница места размещения
    public function single($slug)
    {
        $place = Place::where('slug', $slug)->first();

        if (empty($place) || $place['enabled'] !== 1) {
            abort(404);
        }

        $rooms = Room::where('place_id', '=', $place->id)->get();
        $infrastructure = Infrastructure::where('place_id', '=', $place->id)->get();
        $treatment = Treatment::where('place_id', '=', $place->id)->get();
        $food = Food::where('place_id', '=', $place->id)->get();

        $slides = Gallery::where('place_id', $place->id)->where('is_main', '1')->first();
        $slides = $slides['images'];

        return view('public.places.single', ['place' => $place, 'slides' => $slides, 'rooms' => $rooms, 'infrastructure' => $infrastructure, 'treatment' => $treatment, 'food' => $food]);
    }
}
