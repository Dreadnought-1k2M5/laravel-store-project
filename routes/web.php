<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('index', ['products' => ['product1', 'product2', 'product3', 'product4', 'product5', 'product6', 'product7', 'product8']]);
}); */

//show register modal component view.
/* Route::view('/signup', ['users.register']);
 */

 Route::view('/login', 'users.login')->name('login');


//Show all products
Route::get('/', [ProductController::class, 'index']);
Route::get('/test', [ProductController::class, 'test']);

//show single product
//implicit binding requires the URI param segment should exactly match the model class name and the parameter defined at specified controller function.
Route::get('/product/{products}', [ProductController::class, 'show']);

/* Route::get('/carts', [ProductController::class, '']) */

Route::controller(UserController::class)->group(function(){
    Route::post('/store', 'store'); //Register route
    Route::post('/login/auth','authenticate'); //authenticate user (logging in)
    Route::post('/logout', 'logout')->middleware('auth'); //logout user.
});


//Cart
Route::controller(CartController::class)->group(function(){
    Route::post('/user/store-cart', 'store')->middleware('auth');
    Route::get('/cart', 'show')->middleware('auth');
    Route::delete('/delete-item', 'delete');
});

