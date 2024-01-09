<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\Mall\CartController;
use App\Http\Controllers\Mall\checkoutController;
use App\Http\Controllers\Mall\landingPageController;
use App\Http\Controllers\Mall\ProductController;
use App\Http\Controllers\Mall\profileController;
use App\Http\Controllers\Mall\settingController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your appli cation. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Testing */
Route::get('test', [TestingController::class, 'index']);
Route::get('/', [landingPageController::class, 'index'])->name('index');
Route::get('mail', [registerController::class, 'mailTest'])->name('mail-test');

/* Auth or Guest */
Route::middleware(['auth', 'guest'])->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::post('modal-product', [ProductController::class, 'getProductById'])->name('modal-product');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [loginController::class, 'logout']);

    /* Mall */
    Route::get('/profile', [profileController::class, 'index']);

    Route::get('/setting', [settingController::class, 'index']);
    Route::post('/setting', [settingController::class, 'edit']);

    Route::controller(CartController::class)->group(function () {
        Route::get('cart', 'index');
        Route::post('add-to-cart/{product_id}/{quantity?}', 'addToCart')->name('cart.add');
        Route::post('update-cart-item', 'updateCartItem')->name('cart.update');
        Route::post('delete-cart-item', 'deleteCart')->name('cart.delete');
    });

    Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout.view');
    Route::post('checkout', [checkoutController::class, 'checkout'])->name('checkout.create');
    /* End Mall */


    /* Admin */
    Route::group(['prefix' => 'admin', 'name' => 'admin.'], function(){
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::controller(UsersController::class)->group(function () {
            Route::get('users', 'index')->name('users');
        });
    }); /* End Admin */

});

Route::middleware('guest')->group(function () {
    Route::controller(loginController::class)->group(function () {
        Route::get('login','index')->name('login');
        Route::post('login', 'login');
    });
    Route::controller(registerController::class)->group(function () {
        Route::get('register', 'index');
        Route::post('register', 'addUser');
    });
});

/*
Route::get('admin', \App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');


Route::get('test', \App\Livewire\Test::class)->name('view-test');
Route::get('temp', function () {
    return view('temp');
});
*/
