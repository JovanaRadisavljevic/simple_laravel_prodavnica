<?php

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/products', [ProductsController::class,'index'])->name('products');

Route::get('/products/{type}/{id}', [ProductsController::class, 'show'])
    ->where(['type' => 'sator|ranac', 'id' => '[0-9]+'])
    ->name('product.show');

require __DIR__.'/auth.php';
