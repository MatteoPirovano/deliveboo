<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurants = Restaurant::where('user_id', Auth::id())->get();

      return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();

      return view('admin.restaurants.create', compact('categories'));
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

        $request->validate([
            'name'=> 'required|max:100',
            // 'img'=> 'mimes:jpeg,bmp,png',
            'p_iva'=> 'required|size:11',
            'address'=> 'required|max:100'
        ]);

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->slug = Str::slug($restaurant->name, '-');
        $restaurant->user_id = Auth::id();
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
    public function edit($slug)
    {
      $restaurant = Restaurant::where('slug', $slug)->get()->first();
      if(empty($restaurant)){
          return view('404.error');
      }
      $categories = Category::all();
      return view('admin.restaurants.update', compact('restaurant', 'categories'));
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
