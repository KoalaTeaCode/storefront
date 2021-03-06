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

Route::group([
  'namespace' => 'Api',
  'prefix' => 'api'
  ], function () {

  Route::get('listings', 'ListingsController@index');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'ListingsController@index');

    route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

    Route::get('matcher', 'ListingsController@matcher');

    Route::get('listings/{listingId}/review', 'ListingsController@getReview');
    Route::post('listings/{listingId}/review', 'ListingsController@postReview');
    Route::post('listings/{listingId}/favorite', 'ListingsController@postFavorite');
    Route::post('listings/{listingId}/reserve', 'ListingsController@reserve');
    //@TODO: This route seems to have a bad name
    Route::post('listings/{reservationId}/cancel', 'ListingsController@cancelReservation');
    Route::resource('listings', 'ListingsController');

    Route::resource('reservations', 'ReservationsController');

    Route::get('/profile', "ProfileController@show");
    Route::get('/profile/edit', "ProfileController@edit");
    Route::put('/profile', "ProfileController@update");

    // Route::get('/home', 'HomeController@index');
});
