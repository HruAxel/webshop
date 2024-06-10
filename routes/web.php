<?php

use App\Http\Controllers\ProductController;
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

Route::get('/kezdolap', [ProductController::class, 'index_homepage']
)->name('homepage');

Route::get('/rolunk', function () {
    return view('about');
})->name('about');

Route::get( '/webshop-minden-termek',
    [ProductController::class, 'index']
)->name('webshop');

Route::post('/add-to-cart/{product}', [ProductController::class, 'addToCart']);

Route::get( '/kosar',
    [ProductController::class, 'cart']
)->name('cart');

Route::patch('/kosar', [ProductController::class, 'updateCart'])->name('cart.update');

Route::post('/kosar/ures', [ProductController::class, 'clearCart'])->name('clear.cart');

Route::get('/termek/{product}',
    [ProductController::class, 'productView']
)->name('product.view');

Route::get('/log', function() {
    return view('logpage');
})->name('logpage');
