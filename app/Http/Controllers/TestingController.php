<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index() {
        $user = User::find(1);
        $data =$user->totalPrice;
        $totalPrice = $user->carts()->join('products', 'carts.product_id', '=', 'products.id')
            ->sum(\DB::raw('products.price * carts.quantity'));
        $tax = $user->getTotalPriceWithTax(10);
        $data2= Cart::where('user_id', 1)->get();
        //$data3 = $data2->product->toArray();

        foreach ($data2 as $cartItem) {
            $productDetails = $cartItem->product;
            $brand = $productDetails->brand;
        }

        return response()->json($productDetails->brand);
    }
}
