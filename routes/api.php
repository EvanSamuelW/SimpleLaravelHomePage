<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers'],function(){
    Route::apiResource('admins',AdminController::class);
    // Route::apiResource('customers',CustomerController::class);
});

Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::apiResource('customers',CustomerController::class);
    Route::apiResource('banners',BannerController::class);
    Route::apiResource('products',ProductController::class);
   
});
