<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Dish;
use Illuminate\Support\Str;

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


// Route::get('/payments', 'PaymentsController@pay')->name('payments');

Route::get('/', function () {
    return view('guest.homepage');
});


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

  // Route::post('/prova', 'PaymentsController@prova')->name('prova');

  // Route::post('/result', 'PaymentsController@result')->name('result');

  Route::get('/payment_result', function() {
    return view('guest.prova');
  })->name('payment_result');

  Route::get('/payment', function() {
    // $gateway = new Braintree\Gateway([
    //   'environment' => config('services.braintree.environment'),
    //   'merchantId' => config('services.braintree.merchantId'),
    //   'publicKey' => config('services.braintree.publicKey'),
    //   'privateKey' => config('services.braintree.privateKey')
    // ]);
    $gateway = new Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => '4szxkzqjrjntv2pj',
      'publicKey' => 'f7cmspf5s5779bpk',
      'privateKey' => '5d8ada5bd7f4a635c540fc7596f285f8'
    ]);
    $restaurant = Restaurant::all();
    $token = $gateway->ClientToken()->generate();
    return view('payment', ['token' => $token]);
  })->name('payment');
  
  Route::post('/checkout', function(Request $request) {
    $gateway = new Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => '4szxkzqjrjntv2pj',
      'publicKey' => 'f7cmspf5s5779bpk',
      'privateKey' => '5d8ada5bd7f4a635c540fc7596f285f8'
    ]);
    $data = $request->all();
      dd($data);
          $request->validate([
              'client_name'=> 'required|max:100',
              'client_surname'=> 'required|max:100',
              'client_address'=> 'required|max:100',
              'client_mail'=> 'required|max:100|email:rfc,dns',
              'order_date'=> 'required'
          ]);
  
          $order = new Order();
          $order->fill($data);
          $order->status="accepted";
          $order_result = $order->save();
  
  
          foreach($data['dish_name'] as $key => $slug) {
              $slug = Str::slug($slug, '-');
              $dishes[$key] = Dish::where('slug', $slug)->first();
              if($order_result) {
                  if(!empty($dishes[$key])) {
                      $dishes[$key]->orders()->attach($order->id);
                  }
              }
          }
          
  
    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;
    
    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);
    
    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        return redirect()
          ->route('payment_result', compact('data'))
          ->with('message', 'ok');
    } else {
        $errorString = "";
    
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
    
        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('ERROR');
    }
  })->name('checkout');