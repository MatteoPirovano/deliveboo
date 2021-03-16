<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filter($category) {
        $categories = Category::where('name', $category)->first();
        return response()
            ->json($categories->restaurants);
    }
}
