<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Landmark as LandmarkResource;
use App\Http\Resources\LandmarkCollection;
use App\Http\Controllers\Controller;
use App\Landmark;

class LandmarkController extends Controller
{
    // Список всех достопримечательностей
    public function getLandmarks()
    {
        $landmarks = Landmark::all();

        if ( empty($landmarks) ) { return abort(404); } // 🙄

        return new LandmarkCollection($landmarks); // Eloquent API Resources
    }

    // Достопримечательность
    public function getLandmark($slug)
    {
        $landmark = Landmark::where('slug', $slug)->first();

        if ( empty($landmark) ) { return abort(404); } // 🙄

        return new LandmarkResource($landmark); // Eloquent API Resources
    }
}
