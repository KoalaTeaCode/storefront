<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {



});

Route::group(['middleware' => 'web'], function () {
    Route::auth();


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('listings/{listingId}/review', 'ListingsController@getReview');
    Route::post('listings/{listingId}/review', 'ListingsController@postReview');
    Route::post('listings/{listingId}/favorite', 'ListingsController@postFavorite');
    Route::post('listings/{listingId}/reserve', 'ListingsController@reserve');
    //@TODO: This route seems to have a bad name
    Route::post('listings/{reservationId}/cancel', 'ListingsController@cancelReservation');
    Route::resource('listings', 'ListingsController');

    Route::resource('reservations', 'ReservationsController');

    // Route::get('/home', 'HomeController@index');
});
