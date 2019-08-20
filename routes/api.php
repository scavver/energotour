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
 * Подгрузки координат на яндекс карты.
 */

Route::get('places', 'API\PlaceController@getPlaces');

Route::get('types', 'API\TypeController@getAllTypes');
Route::get('types/{id}', 'API\TypeController@getPlaceIds');

Route::get('categories', 'API\CategoryController@getAllCategories');
Route::get('categories/{id}', 'API\CategoryController@getPlaceIds');

Route::get('properties', 'API\PropertyController@getAllProperties');
Route::get('properties/{id}', 'API\PropertyController@getPlaceIds');

Route::get('coords', 'API\CoordController@getAllCoords');
Route::get('coords/{slug}', 'API\CoordController@getPlaceCoords');
