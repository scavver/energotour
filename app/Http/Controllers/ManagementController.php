<?php
namespace App\Http\Controllers;

use App\Property;
use App\Discount;
use App\Gallery;
use App\Image;
use App\Place;
use App\Price;

class ManagementController extends Controller
{
    // Страница контрольной панели
    public function dashboard()
    {
        $galleries = Gallery::all()->count();
        $images = Image::all()->count();
        $places = Place::all()->count();
        $properties = Property::all()->count();
        $prices = Price::all()->count();
        $discounts = Discount::all()->count();

        return view('management.dashboard', [
            'images' => $images,
            'galleries' => $galleries,
            'places' => $places,
            'properties' => $properties,
            'prices' => $prices,
            'discounts' => $discounts
        ]);
    }
}
