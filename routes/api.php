<?php

use \App\Hotel;
use Illuminate\Http\Request;
use \App\Http\Resources\Hotel as HotelResource;

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

Route::get('hotels', 'API\HotelController@get_hotels');

Route::get('types', 'API\TypeController@get_types');
Route::get('types/{id}', 'API\TypeController@get_hotel_ids');

Route::get('regions', 'API\RegionController@get_regions');
Route::get('regions/{id}', 'API\RegionController@get_hotels_ids');

Route::get('properties', 'API\PropertyController@get_properties');
Route::get('properties/{id}', 'API\PropertyController@get_hotel_ids');

Route::get('coords', 'API\CoordController@get_coords');
Route::get('coords/{slug}', 'API\CoordController@get_hotel_coords');

Route::get('landmarks', 'API\LandmarkController@get_landmarks');
Route::get('landmarks/{slug}', 'API\LandmarkController@get_landmark');
