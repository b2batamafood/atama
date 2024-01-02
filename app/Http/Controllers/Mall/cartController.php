<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;

class cartController extends Controller
{
    public function index()
    {
        return view('cart', [
            "title" => "Cart"
        ]);
    }

    public function addToCart(Request $request, $productId, $quantity)
    {
        $cart = session()->get('cart', []);

        // Add the item to the cart
        $cart[$productId] = $quantity;

        // Store the updated cart in the session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
}
