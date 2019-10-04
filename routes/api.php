<?php

use \App\Place;
use Illuminate\Http\Request;
use \App\Http\Resources\Place as PlaceResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * API на данный момент используется преимущественно для
 *
 * Отображения динамического списка объектов размещения;
 * Подгрузки координат на яндекс карты;
 * Достопримечатнльностей.
 */

Route::get('places', 'API\PlaceController@get_places');

Route::get('types', 'API\TypeController@get_types');
Route::get('types/{id}', 'API\TypeController@get_place_ids');

Route::get('regions', 'API\RegionController@get_regions');
Route::get('regions/{id}', 'API\RegionController@get_places_ids');

Route::get('properties', 'API\PropertyController@get_properties');
Route::get('properties/{id}', 'API\PropertyController@get_place_ids');

Route::get('coords', 'API\CoordController@get_coords');
Route::get('coords/{slug}', 'API\CoordController@get_place_coords');

// Достопримечательности

Route::get('landmarks', 'API\LandmarkController@get_landmarks');
Route::get('landmarks/{slug}', 'API\LandmarkController@get_landmark');
