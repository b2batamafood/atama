<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index(){
        $user = auth()->id();
        return view('mall.cart', [
            'cart' => Product::whereHas('carts', function ($query) use ($user) {
                $query->where('user_id', $user);
            })->with(['carts' => function ($query) use ($user) {
                $query->where('user_id', $user);
            }])->get(),

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

    public function updateCartItem(Request $request) {
        $itemId = $request->input('itemId');
        $quantity = $request->input('quantity');

        // Validate inputs if needed

        // Update the quantity in the database
        $cartItem = Cart::find($itemId);
        if ($cartItem) {
            $cartItem->update(['quantity' => $quantity]);
            // You might want to recalculate the total price in the database
            // based on the new quantity and update other fields as needed.
        }

        $totalPrice = auth()->user()->totalPrice;


        return response()->json([
                'status' => 'success',
                'data' => $totalPrice,
                'message' => 'Cart item updated successfully']
        );
    }

    public function deleteCart(Request $request){
        $itemId = $request->input('itemId');

        // Delete the cart item from the database
        Cart::destroy($itemId);

        return response()->json(['status' => 'success', 'message' => 'Cart item deleted successfully']);
    }
}
