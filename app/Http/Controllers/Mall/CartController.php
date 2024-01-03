<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $user = auth()->id();
        return view('mall.cart', [
            "title" => "Cart",
            'cart' => Product::whereHas('carts', function ($query) use ($user) {
                $query->where('user_id', $user);
            })->with(['carts' => function ($query) use ($user) {
                $query->where('user_id', $user);
            }])->get()
        ]);
    }

    public function addToCart($productId, $quantity = null) {
        $quantity = $quantity ?? 1;

        // Check if the product already exists in the user's cart
        $existingCart = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($existingCart) {
            // If the cart already exists, increase the quantity
            $existingCart->increment('quantity');
        } else {
            // If the cart doesn't exist, create a new cart entry
            $cart = new Cart([
                'user_id' => auth()->id(),
                'product_id' => $productId
            ]);
            $cart->save();
        }

        //return redirect()->back()->with('success', 'Item added to cart successfully.');
        return response()->json(['success' => 'Item added to cart successfully']);
    }
}
