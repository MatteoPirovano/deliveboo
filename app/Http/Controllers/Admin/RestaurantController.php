<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use App\Dish;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{
    private $validation = [
        'name'=> 'required|max:100',
        'img'=> 'mimes:jpeg,jpg,bmp,png,webp',
        'p_iva'=> 'required|unique:restaurants|digits:11',
        'address'=> 'required|max:100'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurants = Restaurant::where('user_id', Auth::id())->get();

      return view('admin.layouts.main', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $restaurants = Restaurant::where('user_id', Auth::id())->get();
    //   $restaurant = Restaurant::where('slug', $slug)->first();

      return view('admin.restaurants.create', compact('categories', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /* $data = $request->all();

      dd($data); */
      $data = $request->all();

        $request->validate($this->validation);

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->slug = Str::slug($restaurant->name, '-');
        $restaurant->user_id = Auth::id();

        if(!empty($data["img"])) {
            $restaurant['img'] = Storage::disk('public')->put('immages', $restaurant['img']);
        }

        $restaurant_result = $restaurant->save();

        $data['restaurant_id'] = $restaurant->id;

        if($restaurant_result) {
            if(!empty($data['categories'])) {
                $restaurant->categories()->attach($data['categories']);
            }
        }

        return redirect()
            ->route('admin.restaurants.index')
            ->with('message', "The restaurant has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $restaurants = Restaurant::where('user_id', Auth::id())->get();

        if(empty($restaurant)){
            return view('404.error');
        }
        return view('admin.restaurants.show', compact('restaurant', 'restaurants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      $restaurant = Restaurant::where('slug', $slug)->get()->first();
      if(empty($restaurant)){
          return view('404.error');
      }
      $categories = Category::all();
      $restaurants = Restaurant::where('user_id', Auth::id())->get();
      return view('admin.restaurants.update', compact('restaurant', 'categories', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $data = $request->all();
        // $data['restaurant_id'] = $restaurant->id;
        $data['slug'] = Str::slug($data['name'], '-');

        $request->validate([
            'name'=> 'required|max:100',
            'img'=> 'mimes:jpeg,jpg,bmp,png',
            'p_iva'=> 'required|digits:11',
            'address'=> 'required|max:100'
            ]);

        if(!empty($data["img"])) {
            // verifico se è presente un'immagine precedente, se si devo cancellarla
            if(!empty($restaurant->img)) {
                Storage::disk('public')->delete($restaurant->img);
            }

            $data["img"] = Storage::disk('public')->put('immages', $data["img"]);
        }

        $restaurant->update($data);

        if(empty($data['categories'])) {
    			$restaurant->categories()->detach();
    	} else $restaurant->categories()->sync($data['categories']);
    

        return redirect()
            ->route('admin.restaurants.index')
            ->with('message', "The restaurant has been edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $restaurant->delete();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('message', "The restaurant has been deleted successfully");
    }

    public function charts($slug) {

      $restaurants = Restaurant::where('user_id', Auth::id())->get();
      $restaurant = Restaurant::where('slug', $slug)->first();
      $dishes = Dish::where('restaurant_id', $restaurant->id)->get();

      
      // $months = [
      //   '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
      // ];

      // $order_dish = [];
      // foreach($dishes as $dish){
        
      // }

      // foreach($months as $month) {
      //    $orders[] = Order::whereMonth('order_date', $month)->sum('price');
       
      // }
        /* foreach ($orders as $order) {
          foreach ($order->dishes as $dish) {
            if ($dish->restaurant_id == $restaurant->id) {
              $control = true;
            } else $control = false;
          }
          if ($control == true) {
            $order_true[] = $order;
          }
        } */

      
      return view('admin.restaurants.charts', compact('restaurants', 'restaurant', 'dishes'));

  }
}
