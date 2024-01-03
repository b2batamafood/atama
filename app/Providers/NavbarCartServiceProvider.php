<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NavbarCartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.mall.layouts.app', function ($view) {
            $userId = auth()->id(); // Assuming you're using authentication
            $cartQuantity = Cart::where('user_id', $userId)->sum('quantity');
            $view->with('cartQuantity', $cartQuantity);
        });
    }
}
