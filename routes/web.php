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

Route::prefix('landmarks')->group(function () {
    Route::get('/', 'LandmarkController@index')->name('landmarks');                 // Список всех достопримечательностей
    Route::get('/{slug}', 'LandmarkController@single')->name('landmarks.single');   // Страница достопримечательности
});

Route::prefix('tourists')->group(function () {
    Route::get('/how-to-booking', 'PageController@howToBooking')->name('tourists.howToBooking');    // Страница "Как забронировать тур"
    Route::get('/how-to-pay', 'PageController@howToPay')->name('tourists.howToPay');                // Страница "Как оплатить"
    Route::get('/faq', 'PageController@faq')->name('tourists.faq');                                 // Страница "Вопрос ответ"
});

Route::get('/history', 'PageController@history')->name('history');                         // Страница "История компании"
Route::get('/contacts', 'PageController@contacts')->name('contacts');                      // Страница "Контакты"
Route::get('/docs', 'PageController@docs')->name('docs');                                  // Страница "Ргеистрационные документы"
Route::get('/avia', 'PageController@avia')->name('avia');                                  // Страница "Авиабилеты"

Route::get('booking', function () {
    return view('public.booking');
})->name('booking');

// Management
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('management')->group(function () {
        Route::get('/', 'ManagementController@dashboard')->name('dashboard');                               // Контрольная панель

        Route::resource('/landmarks', 'Management\LandmarkController')->except(['show']);                   // Достопримечательности
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
        Route::resource('/regions', 'Management\RegionController')->except(['show']);                       // Регионы
        Route::resource('/types', 'Management\TypeController')->except(['show']);                           // Типы
        Route::resource('/images', 'Management\ImageController')->except(['index', 'create', 'show']);      // Картинки
    });
});
