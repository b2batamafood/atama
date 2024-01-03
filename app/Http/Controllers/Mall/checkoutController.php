<?php

namespace App\Http\Controllers\Mall;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function index()
    {
        return view('mall.checkout', [
            "title" => "Checkout"
        ]);
    }
}
