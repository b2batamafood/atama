<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::with(['brand','category'])->get();

        return view('admin.products.index', 
        [
            "title" => "Products",
            "products" => $products
        ]);
    }
}
