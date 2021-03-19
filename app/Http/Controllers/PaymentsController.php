<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function pay() {
        return view('/payment');
    }

    public function prova(Request $request) {
        $data = $request->all();
        return view('guest.prova' , compact('data'));
    }

    public function result($data) {

        
    }
}
