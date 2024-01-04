<?php

namespace App\Http\Controllers\Mall;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Notifications\CheckoutNotification;
use App\Notifications\UserRegistrationNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class checkoutController extends Controller {
    public function index(): View {
        $user = auth()->id();

        return view('mall.checkout', [
            'cart' => Product::whereHas('carts', function ($query) use ($user) {
                        $query->where('user_id', $user);
                    })->with(['carts' => function ($query) use ($user) {
                        $query->where('user_id', $user);
                    }])->get(),
        ]);
    }

    public function checkout(Request $request) {

        $this->validate($request, [
            'fullname' => 'required',
            'company' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required',

            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'address' => 'required',

            'card_holder' => 'required',
            'card_no' => 'required',
            'card_exp' => 'required',
            'card_cvc' => 'required',
        ]);


        $cart = Cart::where('user_id', auth()->id());
        $cartItems = $cart->get();
        $subtotal = auth()->user()->totalPrice;

        // Create a new order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tax' => 3,
            'subtotal' => $subtotal,
            'total' => $subtotal + 3 + 8,

            'name' => $request->fullname,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,

            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'zipcode' => $request->zipcode,

            'card_holder' => $request->card_holder,
            'card_no' => $request->card_no,
            'card_exp' => $request->card_exp,
            'card_cvc' => $request->card_cvc,
        ]);

// Create OrderDetails for each cart item
        foreach ($cartItems as $cartItem) {
            $product = $cartItem->product;

            OrderDetail::create([
                'order_id' => $order->id,
                'quantity' => $cartItem->quantity,

                'code' => $product->code,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,

                'category' => $product->category->name,
                'brand' => $product->brand->name,
            ]);
        }

        $cart->delete();

        Notification::route('mail', auth()->user()->email)
            ->notify(new CheckoutNotification());
        Notification::route('mail', 'erwansutanto@gmail.com')
            ->notify(new CheckoutNotification());
        return redirect('/')->with(['success' => 'Order Anda sedang diproses']);
    }
}
