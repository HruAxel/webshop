<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyUsers;
use Illuminate\Support\Facades\Auth;

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

Route::get( '/webshop-szalas-teak',
    [ProductController::class, 'looseLeafTeas']
)->name('tea');

Route::get( '/webshop-matcha-teak',
    [ProductController::class, 'matchatea']
)->name('matcha');

Route::get( '/webshop-kiegeszitok',
    [ProductController::class, 'accessory']
)->name('accessory');

Route::get( '/webshop-egyeb',
    [ProductController::class, 'other']
)->name('other');

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

Route::get('/bejelentkezes', function() {
    return view('login');
})->name('login');

Route::post('/bejelentkezés', [UserController::class, 'loginProcess'])->name('post.login');

Route::get('/regisztráció', function() {
    return view('register');
})->name('register');

Route::post('/regisztráció', [UserController::class, 'register'])->name('post.register');

Route::get('/profil', function() {
    return view('profile');
})->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('homepage')->with('succes', __('Sikeresen kijelentkeztél!'));
})->name('logout')->middleware([OnlyUsers::class]);

Route::post(
    '/profil/general-data', [UserController::class, 'generalDataSave']
)->name('post.generalData')->middleware([OnlyUsers::class]);


Route::post(
    '/profil/password-changed', [UserController::class, 'changePasswordSave']
)->name('post.changePasswordSave')->middleware([OnlyUsers::class]);


Route::post('/profil/billing-changed', [UserController::class, 'changeBillingData'])
->name('post.changeBilling')->middleware([OnlyUsers::class]);