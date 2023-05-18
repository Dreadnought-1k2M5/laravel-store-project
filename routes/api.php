<?php

use App\Http\Controllers\Api\V1\CartResourceController;
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
    //Route for Cart
    Route::apiResource('cart', CartResourceController::class)->middleware(['auth:sanctum']);

    Route::post('/login', [UserResourceController::class, 'login']);
    Route::get('/check', [UserResourceController::class, 'check'])->middleware(['auth:sanctum', 'ability:read']);
});

