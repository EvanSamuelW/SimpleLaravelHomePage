<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  function () {
    $products = (new ProductController)->index();
    $banners = (new BannerController)->index();
    return view('homepage', ['isAdmin' => false,'isLogin'=>false,'products'=>$products,'banners'=>$banners]);
}); 

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('postlogin', [LoginController::class, 'login'])->name('postlogin'); 
Route::get('signup', [LoginController::class, 'signup'])->name('register-user');
Route::post('postsignup', [LoginController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::get('detail/{id}',  [CustomerController::class, 'showDetail'])->name('detail'); 
Route::get('approve/{id}', [CustomerController::class, 'update'])->name('approve');

