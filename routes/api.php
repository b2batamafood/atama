<?php

use App\Http\Controllers\Api\ApiTestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('auth', [ApiTestingController::class, 'auth']);
Route::get('getdata', [ApiTestingController::class, 'getData']);

/*Route::get('soap', [\App\Http\Controllers\Soap\SoapClientController::class, 'index']);

Route::get('/soap/wsdl', [\App\Http\Controllers\Argh\SoapController::class, 'wsdlAction'])->name('soap-wsdl');
Route::post('/soap/server', [\App\Http\Controllers\Argh\SoapController::class, 'serverAction'])->name('soap-server');*/


Route::get('qwc', [\App\Http\Controllers\RandQ\ServerController::class, 'handleRequest']);
