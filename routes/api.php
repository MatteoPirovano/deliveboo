<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Category;
use App\Restaurant;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/restaurants', function () {

    $restaurants = Restaurant::all();
    return response()
    ->json($restaurants);
});

Route::get('/restaurants/{category}', function ($category) {
    $categories = Category::where('name', $category)->first();
    return response()
    ->json($categories->restaurants);
});

