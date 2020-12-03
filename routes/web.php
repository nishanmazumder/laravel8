<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('product-category/{id}', [HomeController::class, 'productCategoryPage']);
Route::get('product-single/{id}/{name}', [HomeController::class, 'productSinglrPage']);

//Cart
Route::get('cart-add/{id}', [HomeController::class, 'cartAdd']);
Route::get('product-cart', [HomeController::class, 'cartView']);
Route::post('cart-update', [HomeController::class, 'cartUpdate']);
Route::get('cart-delete/{id}', [HomeController::class, 'cartDelete']);
Route::get('cart-empty', [HomeController::class, 'cartEmpty']);

//Order
Route::get('login-user', [HomeController::class, 'login']);
Route::get('register-user', [HomeController::class, 'register']);

Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //Product
    Route::resource('product', ProductController::class)->except(['show']);
    Route::get('product-unpublish/{id}', [ProductController::class, 'unpublish']);
    Route::get('product-publish/{id}', [ProductController::class, 'publish']);

    //Category
    Route::resource('category', CategoryController::class)->except(['show']);
    Route::get('cat-unpublish/{id}', [CategoryController::class, 'unpublish']);
    Route::get('cat-publish/{id}', [CategoryController::class, 'publish']);

    //Brand
    Route::resource('brand', BrandController::class)->except(['show']);
    Route::get('brand-unpublish/{id}', [BrandController::class, 'unpublish']);
    Route::get('brand-publish/{id}', [BrandController::class, 'publish']);

});
