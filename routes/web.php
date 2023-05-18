<?php

use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\UserController;
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
 Route::view('/profile', 'pages.my-order');


//Show all products
Route::get('/', [ProductController::class, 'index']);
Route::get('/search', [ProductController::class, 'showListCategory']);
Route::get('/product/{products}', [ProductController::class, 'show']);//show single product




Route::controller(UserController::class)->group(function(){
    Route::post('/store', 'store'); //Register route
    Route::post('/login/auth','authenticate'); //authenticate user (logging in)
    Route::post('/logout', 'logout')->middleware('auth'); //logout user.
});

Route::controller(CartController::class)->group(function(){ //Cart
    Route::post('/user/store-cart', 'store');
    Route::get('/cart', 'show')->middleware('auth');
    Route::delete('/delete-item', 'delete');
});


Route::controller(OrderController::class)->group(function(){
    Route::post('/checkout', 'checkout')->name('checkout');
});

Route::post('payment', [PaymentController::class, 'pay'])->name('payment');
Route::get('success/{id}', [PaymentController::class, 'success']);
Route::get('error/{id}', [PaymentController::class, 'error']);