<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $dishes = Dish::where('restaurant_id', $id)->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {   
        $restaurant = Restaurant::where('slug', $slug)->first();
        return view ('admin.dishes.create', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        
        $data = $request->all();
        // dd($data);
        $request->validate([
            'name'=> 'required|max:100',
            // 'img'=> 'mimes:jpeg,bmp,png',
            'ingredients'=> 'required|max:1000',
            'courses'=> 'required',
            'description'=> 'required|max:1500',
            'price'=> 'required|numeric',
            'visibility'=> 'required'
        ]);

        $dish = new Dish();
        $dish->fill($data);
        $dish->slug = Str::slug($dish->name, '-');
        $restaurant = Restaurant::where('slug', $slug)->first();
        // dd($restaurant->id);
        $dish->restaurant_id = $restaurant->id;
        $dish_result = $dish->save();

        return redirect()
            ->route('admin.restaurants.dishes.index', $restaurant->id)
            ->with('message', "The dish has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
