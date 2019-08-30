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
        Route::get('/', 'ManagementController@dashboard')->name('dashboard');                               // Контрольная панель

        Route::resource('/pages', 'Management\PageController')->except(['show']);                           // Страницы
        Route::resource('/galleries', 'Management\GalleryController')->except(['show']);                    // Галереи
        Route::resource('/rooms', 'Management\RoomController')->except(['show']);                           // Номера
        Route::resource('/about', 'Management\AboutController')->except(['show']);                          // Описания
        Route::resource('/food', 'Management\FoodController')->except(['show']);                            // Питание
        Route::resource('/infrastructure', 'Management\InfrastructureController')->except(['show']);        // Инфраструктура
        Route::resource('/treatment', 'Management\TreatmentController')->except(['show']);                  // Лечение
        Route::resource('/places', 'Management\PlaceController')->except(['show']);                         // Места
        Route::resource('/prices', 'Management\PriceController')->except(['show']);                         // Прайсы
        Route::resource('/discounts', 'Management\DiscountController')->except(['show']);                   // Скидки
        Route::resource('/users', 'Management\UserController')->except(['show']);                           // Пользователи
        Route::resource('/properties', 'Management\PropertyController')->except(['show']);                  // Услуги и удобства
        Route::resource('/categories', 'Management\CategoryController')->except(['show']);                  // Регионы
        Route::resource('/types', 'Management\TypeController')->except(['show']);                           // Типы
        Route::resource('/images', 'Management\ImageController')->except(['index', 'create', 'show']);      // Картинки
    });
});
