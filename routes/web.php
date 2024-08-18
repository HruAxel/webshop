<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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

/* PAGES */

Route::get('/', [ProductController::class, 'index_homepage']
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

/* CART, PRODUCT */

Route::post('/add-to-cart/{product}', [ProductController::class, 'addToCart']);

Route::get( '/kosar',
    [ProductController::class, 'cart']
)->name('cart');

Route::patch('/kosar', [ProductController::class, 'updateCart'])->name('cart.update');

Route::post('/kosar/ures', [ProductController::class, 'clearCart'])->name('clear.cart');

Route::get('/termek/{name}',
    [ProductController::class, 'productView']
)->name('product.view');

/* LOG, REGISTER */

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

/* PROFIL */

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



/* ADMIN */

Route::get('/admin-log', function() {
    return view('admin_login');
})->name('admin.login');

Route::post('/admin-login', [UserController::class, 'adminLoginProcess'])->name('post.adminlogin');

Route::get('/admin-dashboard', function() {
    return view('admin_dashboard');
})->name('dashboard')->middleware('admin');

Route::post('/admin-logout', [UserController::class, 'adminLogout'])->name('admin.logout');

Route::get('/admin-productlist', [ProductController::class, 'admin_product'] 
 
)->name('productlist')->middleware('admin');

Route::get('/admin-edit/{product}', [ProductController::class, 'adminProductEdit'] 
 
)->name('adminedit')->middleware('admin');

Route::post('/admin-edit/{id}', [ProductController::class, 'adminProductUpdate'] 
 
)->name('product.edit')->middleware('admin');

Route::post('/admin-edit/delete/{id}', [ProductController::class, 'adminProductDelete'] 
 
)->name('product.delete')->middleware('admin');

Route::get('/admin-newproduct', [ProductController::class, 'adminCreateView'] 
 
)->name('newproduct.view')->middleware('admin');

Route::post('/admin-addproduct', [ProductController::class, 'adminAddProduct'] 
 
)->name('addproduct')->middleware('admin');


