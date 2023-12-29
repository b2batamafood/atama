<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dashboardproductsController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\settingController;
use App\Mail\UserRegistrationMail;
use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\Mail;
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
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/login',[loginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login',[loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'addUser']);

Route::get('/profile', [profileController::class, 'index'])->middleware('auth');

Route::get('/setting', [settingController::class, 'index'])->middleware('auth');
Route::post('/setting', [settingController::class, 'edit']);

Route::get('/dashboard', [dashboardController::class, 'index']);
Route::get('/dashboard/products', [dashboardproductsController::class, 'index']);
Route::post('/dashboard/products', [dashboardproductsController::class, 'uploadFile']);

Route::get('mail', [registerController::class, 'mailTest'])->name('mail-test');
