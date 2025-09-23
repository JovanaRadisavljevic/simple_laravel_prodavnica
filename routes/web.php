<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';
Route::get('/', [AuthController::class, 'showLoginPage'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/products', [ProductsController::class,'index'])->name('products');

Route::get('/products/{type}/{id}', [ProductsController::class, 'show'])
    ->where(['type' => 'sator|ranac', 'id' => '[0-9]+'])
    ->name('product.show');

Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::delete('/cart/{type}/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/add/{type}/{id}', [CartController::class, 'store'])->name('cart.store');
