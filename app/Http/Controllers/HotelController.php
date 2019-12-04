<?php

namespace App\Http\Controllers;

use App\Infrastructure;
use App\Treatment;
use App\Gallery;
use App\Hotel;
use App\Food;
use App\Room;

class HotelController extends Controller
{
    // Страница всех мест размещения - "Санатории и отели"
    public function index()
    {
        // В шаблон встроен компонент Hotels.vue
        return view('public.hotels.index');
    }

    // Страница места размещения
    public function single($slug)
    {
        $hotel = Hotel::where('slug', $slug)->first();

        if (empty($hotel) || $hotel['enabled'] !== 1) {
            abort(404);
        }

        $rooms = Room::where('hotel_id', '=', $hotel->id)->get();
        $infrastructure = Infrastructure::where('hotel_id', '=', $hotel->id)->get();
        $treatment = Treatment::where('hotel_id', '=', $hotel->id)->get();
        $food = Food::where('hotel_id', '=', $hotel->id)->get();

        $slides = Gallery::where('hotel_id', $hotel->id)->where('is_main', '1')->first();
        $slides = $slides['images'];

        return view('public.hotels.single', ['hotel' => $hotel, 'slides' => $slides, 'rooms' => $rooms, 'infrastructure' => $infrastructure, 'treatment' => $treatment, 'food' => $food]);
    }
}
