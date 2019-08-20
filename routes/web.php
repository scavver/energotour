<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@home')->name('home');   // Главная страница
Route::get('/pages/{slug}', 'PageController@page');     // Кастомные страницы (Контакты, О компании, и т.д.)

Auth::routes(['verify' => true, 'register' => false]);  // Laravel Authorization, Блокировка регистрации

// Public
Route::prefix('places')->group(function () {
    Route::get('/', 'PlaceController@index')->name('places');                 // Список всех мест размещения - "Санатории и отели"
    Route::get('/{slug}', 'PlaceController@single')->name('places.single');   // Страница санатория или отеля
});

// Management
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('management')->group(function () {
        Route::get('/', 'ManagementController@dashboard')->name('dashboard');

        Route::resource('/galleries', 'Management\GalleryController')->except(['show']);
        Route::resource('/types', 'Management\TypeController')->except(['show']);
        Route::resource('/categories', 'Management\CategoryController')->except(['show']);
        Route::resource('/users', 'Management\UserController')->except(['show']);
        Route::resource('/properties', 'Management\PropertyController')->except(['show']);
        Route::resource('/places', 'Management\PlaceController')->except(['show']);
        Route::resource('/prices', 'Management\PriceController')->except(['show']);
        Route::resource('/discounts', 'Management\DiscountController')->except(['show']);
        Route::resource('/images', 'Management\ImageController')->except(['index', 'create', 'show']);
    });
});
