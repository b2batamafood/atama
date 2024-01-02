<?php

namespace App\Http\Controllers\Mall;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class landingPageController extends Controller
{
    public function index()
    {

        $records1 = Product::select()->take(4)->get();
        $records2 = Product::orderByRaw('RAND()')->take(4)->get();

        $categories = Category::all();

        $cart = session()->get('cart', []);

        return view('mall/index', [
            "title" => "Mall",
            "products1" => $records1,
            "products2" => $records2,
            "categories" => $categories,
            "cart" => count($cart),
        ]);
    }
}
