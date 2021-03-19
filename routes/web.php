<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Route::get('/payment', 'PaymentsController@pay')->name('payment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homepage', 'PublicController@home')->name('homepage');
Route::get('/{slug}', 'PublicController@show')->name('details');

//ROTTE PROTETTE DA AUTENTICAZIONE
Route::prefix('admin')       // prefisso delle rotte
  ->namespace('Admin')    // namespace (sottocartella del controller)
  ->middleware('auth')          // filtro per autenticazione
  ->name('admin.')        // prefisso di tutti i nomi delle rotte
  ->group(
    function () {
        Route::resource('restaurants', 'RestaurantController');
        Route::prefix('restaurants/{restaurant}')
            ->name('restaurants.')
            ->group(function () {
            Route::resource('dishes', 'DishController');
        });
    }
  );

  Route::post('/prova', 'PaymentsController@prova')->name('prova');

  Route::post('/result', 'PaymentsController@result')->name('result');
