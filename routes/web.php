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

Auth::routes(['verify' => true, 'register' => false]);  # Laravel Authorization + disabling register route

/**
 * Public Routes
 *
 *
 */
Route::get('/', 'PageController@home')->name('home');   # Main page
Route::get('/pages/{slug}', 'PageController@page');     # Pages

Route::prefix('hotels')->group(function () {
    Route::get('/', 'HotelController@index')->name('hotels');                 # Hotels
    Route::get('/order', 'OrderController@create')->name('create');           # Order
    Route::post('/order', 'OrderController@store');                           # Order (POST)
    Route::get('/{slug}', 'HotelController@single')->name('hotels.single');   # Hotel
});

Route::prefix('landmarks')->group(function () {
    Route::get('/', 'LandmarkController@index')->name('landmarks');                 # Landmarks
    Route::get('/{slug}', 'LandmarkController@single')->name('landmarks.single');   # Landmark
});

# TODO: Make custom pages -> usual (/pages/{slug}).

Route::prefix('tourists')->group(function () {
    Route::get('/how-to-booking', 'PageController@howToBooking')->name('tourists.howToBooking');    // Страница "Как забронировать тур"
    Route::get('/how-to-pay', 'PageController@howToPay')->name('tourists.howToPay');                // Страница "Как оплатить"
    Route::get('/public-offer', 'PageController@publicOffer')->name('tourists.publicOffer');        // Страница "Как оплатить"
    Route::get('/faq', 'PageController@faq')->name('tourists.faq');                                 // Страница "Вопрос ответ"
});

Route::get('/agencies', 'PageController@agencies')->name('agencies.docs');                 // Страница "Как оплатить"

Route::get('/history', 'PageController@history')->name('history');                         // Страница "История компании"
Route::get('/contacts', 'PageController@contacts')->name('contacts');                      // Страница "Контакты"
Route::get('/excursions', 'PageController@excursions')->name('excursions');                // Страница "Экскурсии"
Route::get('/documents', 'PageController@documents')->name('documents');                   // Страница "Ргеистрационные документы"
Route::get('/avia', 'PageController@avia')->name('avia');                                  // Страница "Авиабилеты"

Route::get('booking', function () { return view('public.booking'); })->name('booking');


/**
 * Management Routes
 *
 *
 */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('management')->group(function () {
        Route::get('/', 'ManagementController@dashboard')->name('dashboard');                               # Dashboard

        Route::resource('/images', 'Management\ImageController')->except(['index', 'create', 'show']);      # Images
        Route::resource('/galleries', 'Management\GalleryController')->except(['show']);                    # Galleries

        Route::resource('/landmarks', 'Management\LandmarkController')->except(['show']);                   # Landmarks
        Route::resource('/pages', 'Management\PageController')->except(['show']);                           # Pages

        Route::resource('/hotels', 'Management\HotelController')->except(['show']);                         # Hotels
        Route::resource('/properties', 'Management\PropertyController')->except(['show']);                  # Properties
        Route::resource('/regions', 'Management\RegionController')->except(['show']);                       # Regions
        Route::resource('/types', 'Management\TypeController')->except(['show']);                           # Types
        Route::resource('/discounts', 'Management\DiscountController')->except(['show']);                   # Discounts
        Route::resource('/prices', 'Management\PriceController')->except(['show']);                         # Prices

        Route::resource('/rooms', 'Management\RoomController')->except(['show']);                           # Rooms
        Route::resource('/about', 'Management\AboutController')->except(['show']);                          # About
        Route::resource('/food', 'Management\FoodController')->except(['show']);                            # Food
        Route::resource('/infrastructure', 'Management\InfrastructureController')->except(['show']);        # Infrastructure
        Route::resource('/treatment', 'Management\TreatmentController')->except(['show']);                  # Treatment

        Route::resource('/users', 'Management\UserController')->except(['show']);                           # Users

        Route::resource('/orders', 'Management\OrderController')->except(['create', 'store', 'edit', 'update']); # Orders
    });
});
