<?php
namespace App\Http\Controllers;

use App\Document;
use App\Image;
use App\Place;

class ManagementController extends Controller
{
    public function dashboard()
    {
        $models = [
            'place'    => [
                'all'       => Place::all()->count(),
                'enabled'   => Place::all()->where('enabled', '=', '1')->count(),
            ],
            'image'    => [
                'all' => Image::all()->count(),
            ],
            'document' => [
                'all' => Document::all()->count(),
            ],
        ];

        return view('management.dashboard', [
            'models' => $models,
        ]);
    }
}
