<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('signup', [MemberController::class, 'signup']);
Route::post('login', [MemberController::class, 'login']);
Route::post('booking', [BookController::class,'book']);



Route::middleware('auth:sanctum')->group(function () {

    Route::post('addorder', [OrderController::class, 'addorder']);
    Route::post('addcoffee', [CoffeeController::class, 'addcoffee']);
    Route::get('coffees', [CoffeeController::class, 'allcoffee']);
    Route::get('allcarts',[CartController::class,'allCarts']);
    Route::post('addtocart/{id}', [CartController::class, 'addToCart']);
    Route::get('mycart',[CartController::class,'myCart']);
    Route::get('subtotal',[CartController::class,'subTotal']);
    Route::post('checkout',[OrderController::class, 'checkOut' ]);
    Route::delete('removecheckout',[OrderController::class,'removeOrders']);
});



