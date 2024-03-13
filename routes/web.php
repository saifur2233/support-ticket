<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('my-menu', 'menu');

Route::group(['prefix' => 'customer', 'as' => 'customer-', 'namespace' => 'App\Http\Controllers\Customer'], function() {

    Route::get('registration', 'RegistrationController@registration')->name('registration')->middleware('guest');

    Route::post('registration-store', 'RegistrationController@registrationStore')->name('registration-store');

    Route::view('login', 'customer.login')->name('login')->middleware('guest');

    Route::post('authenticate', 'AuthenticationController@authenticate')->name('authenticate');

    Route::group(['middleware' => ['auth:customer']], function() {

        Route::view('dashboard', 'customer.dashboard')->name('dashboard');

        Route::post('logout', 'AuthenticationController@logout')->name('logout');

    });

});

Route::group(['prefix' => 'admin', 'as' => 'admin-', 'namespace' => 'App\Http\Controllers\Admin'], function() {

    Route::view('login', 'admin.login')->name('login')->middleware('guest');

    Route::post('authenticate', 'AuthenticationController@authenticate')->name('authenticate');

    Route::group(['middleware' => ['auth:admin']], function() {

        Route::view('dashboard', 'admin.dashboard')->name('dashboard');

        Route::post('logout', 'AuthenticationController@logout')->name('logout');

    });
});
