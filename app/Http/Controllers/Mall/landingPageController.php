<?php

namespace App\Http\Controllers\Mall;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;

class landingPageController extends Controller
{
    public function index()
    {

        $records1 = Product::select()->take(4)->get();
        $records2 = Product::orderByRaw('RAND()')->take(4)->get();

        $categories = Category::all();

        //$cart = session()->get('cart', []);
        $cart = Cart::where('user_id', auth()->id())->sum('quantity');

        return view('mall/index', [
            "title" => "Mall",
            "products1" => $records1,
            "products2" => $records2,
            "categories" => $categories,
            "cart" => $cart,
        ]);
    }
}
