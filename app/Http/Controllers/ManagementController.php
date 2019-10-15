<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Document;
use App\Image;
use App\Place;

class ManagementController extends Controller
{
    public function dashboard()
    {
        $model = [
            'places'    => [
                'all'       => Place::all()->count(),
                'enabled'   => Place::all()->where('enabled', '=', '1')->count(),
            ],
            'images'    => Image::all()->count(),
            'documents' => Document::all()->count(),
        ];

        $storage = [
            'images'    => count(Storage::files('/images/')),
            'documents' => count(Storage::files('/docs/')),
        ];

        return view('management.dashboard', [
            'model' => $model,
            'storage' => $storage,
        ]);
    }
}
