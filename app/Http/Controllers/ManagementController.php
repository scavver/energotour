<?php
namespace App\Http\Controllers;

use App\Document;
use App\Image;
use App\Hotel;

class ManagementController extends Controller
{
    public function dashboard()
    {
        $models = [
            'hotel'    => [
                'all'       => Hotel::all()->count(),
                'enabled'   => Hotel::all()->where('enabled', '=', '1')->count(),
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
