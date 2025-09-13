<?php

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

Route::get('/', function () {
    echo 'Welcome';
});
Route::get('/products', [ProductsController::class,'index']);

Route::get('/products/{type}/{id}', [ProductsController::class, 'show'])
    ->where(['type' => 'sator|ranac', 'id' => '[0-9]+'])
    ->name('product.show');

require __DIR__.'/auth.php';
