<?php

namespace App\Http\Controllers;

use App\Landmark;
use Illuminate\Http\Request;

class LandmarkController extends Controller
{
    // Список всех достопримечательностей
    public function index()
    {
        return view('public.landmarks.index');
    }

    // Достопримечательность
    public function single($slug)
    {
        $landmark = Landmark::where('slug', $slug)->first();

        if ( empty($landmark) ) { return abort(404); } // Типо грибы

        return view('public.landmarks.single', ['landmark' => $landmark]);
    }
}
