<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\Mall\cartController;
use App\Http\Controllers\Mall\checkoutController;
use App\Http\Controllers\Mall\dashboardController;
use App\Http\Controllers\Mall\dashboardproductsController;
use App\Http\Controllers\Mall\landingPageController;
use App\Http\Controllers\Mall\ProductController;
use App\Http\Controllers\Mall\profileController;
use App\Http\Controllers\Mall\settingController;
use App\Http\Controllers\registerController;
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

Route::get('/', [landingPageController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/modal-product', [ProductController::class, 'getProductById'])->name('modal-product');

Route::get('/login', [loginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'addUser']);

Route::get('/profile', [profileController::class, 'index'])->middleware('auth');

Route::get('/setting', [settingController::class, 'index'])->middleware('auth');
Route::post('/setting', [settingController::class, 'edit']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/add-to-cart/{product_id}/{quantity?}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/update-cart-item', [CartController::class, 'updateCartItem'])->name('cart.update');
Route::post('/delete-cart-item', [CartController::class, 'deleteCart'])->name('cart.delete');

Route::get('/checkout', [checkoutController::class, 'index'])->middleware('auth');

Route::get('/dashboard', [dashboardController::class, 'index']);
Route::get('/dashboard/products', [dashboardproductsController::class, 'index']);
Route::post('/dashboard/products', [dashboardproductsController::class, 'uploadFile']);
