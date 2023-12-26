<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index(){

        $records1 = Product::select()->take(4)->get();
        $records2 = Product::orderByRaw('RAND()')->take(4)->get();

        return view('index', [
            "title" => "Mall",
            "products1" => $records1,
            "products2" => $records2
        ]);
    }
}
