<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class PublicController extends Controller
{
    public function home() {
        $restaurants = Restaurant::all();
        return view('guest.homepage', compact($restaurants));
    }
}
