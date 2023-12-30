<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;

class cartController extends Controller
{
    public function index(){
        return view('mall.cart', [
            "title" => "Cart"
        ]);
    }
}
