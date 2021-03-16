<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;

class HomeController extends Controller
{
    public function allCategories() {
        $restaurants = Restaurant::all();
        return response()
        ->json($restaurants);
    }

    public function filter($category) {
        $categories = Category::where('name', $category)->first();
        return response()
            ->json($categories->restaurants);
    }

    public function categories() {
        $categories = Category::all();
        return response()
            ->json($categories);
    }
}
