<?php

use App\Http\Controllers\Api\V1\CartResourceController;
use App\Http\Controllers\API\V1\PaymentResourceController;
use App\Http\Controllers\Api\V1\ProductResourceController;
use App\Http\Controllers\Api\V1\UserResourceController;
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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    //Route for Products
    Route::apiResource('products', ProductResourceController::class)->middleware(['auth:sanctum']);
    Route::post('/search/category', [ProductResourceController::class, 'searchByCategory']);

    //Route for Cart
    Route::apiResource('cart', CartResourceController::class)->middleware(['auth:sanctum']);
    Route::post('/cart/insert-bulk', [CartResourceController::class, 'bulkStore'])->middleware(['auth:sanctum']);

    Route::delete('/delete', [CartResourceController::class, 'delete'])->middleware(['auth:sanctum']);
    Route::post('/login', [UserResourceController::class, 'login']);
    Route::get('/check', [UserResourceController::class, 'check'])->middleware(['auth:sanctum', 'ability:read']);

    Route::post('/payment', [PaymentResourceController::class, 'pay'])->name('payment');
    Route::get('success/{id}', [PaymentController::class, 'success']);
    Route::get('error/{id}', [PaymentController::class, 'error']);
});

