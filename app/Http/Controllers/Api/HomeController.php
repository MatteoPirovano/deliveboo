<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use App\Order;

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

    public function details($slug) {
        $restaurant = Restaurant::where('slug', $slug)->first();
        return response()
            ->json($restaurant->dishes);
    }

    public function charts() {
        $months = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
          ];
    
          foreach($months as $month) {
    
            $orders[] = Order::whereMonth('order_date', $month)->sum('price');
           
          }
        return response()
            ->json($orders);
    }

    public function year() {
        $years = [
            '2020', '2021'
          ];
    
          foreach($years as $year) {
    
            $orders[] = Order::whereYear('order_date', $year)->sum('price');
           
          }
        return response()
            ->json($orders);
    }
}
