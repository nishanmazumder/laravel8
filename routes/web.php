<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TailwindController;

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

//Tailwind
// Route::get('tailwind', [TailwindController::class, 'index']);

//Home
Route::get('/', [HomeController::class, 'index']);

//Customer
Route::get('login/customer', [CustomerController::class, 'login']);
Route::post('register/customer', [CustomerController::class, 'register']);



//Product
Route::get('product-category/{id}', [HomeController::class, 'productCategoryPage']);
Route::get('product-single/{id}/{name}', [HomeController::class, 'productSinglrPage']);

//Cart
Route::get('cart-add/{id}', [HomeController::class, 'cartAdd']);
Route::get('product-cart', [HomeController::class, 'cartView']);
Route::post('cart-update', [HomeController::class, 'cartUpdate']);
Route::get('cart-delete/{id}', [HomeController::class, 'cartDelete']);
Route::get('cart-empty', [HomeController::class, 'cartEmpty']);

//Order
Route::get('login/customer/billing', [CustomerController::class, 'loginBilling']);
Route::get('login/customer/verify', [CustomerController::class, 'loginCustomer']);
Route::get('register/customer/billing', [CustomerController::class, 'registerBilling']);
Route::post('customer/add', [CustomerController::class, 'registerCustomer']);
Route::get('customer/logout', [CustomerController::class, 'customerLogout']);



Route::get('customer/billing', [ShippingController::class, 'billingDetails']);
Route::get('ajax/mail/check/{email}', [ShippingController::class, 'ajaxMailCheck']);
Route::post('customer/billing/save/{id}', [ShippingController::class, 'billingsave']);

Route::get('customer/payment', [PaymentController::class, 'customerPayment']);
Route::post('customer/payment/confirm', [PaymentController::class, 'paymentConfirm']);

//MailTest
Route::get('sendmail', [CustomerController::class, 'sendmail']);

Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');

//php -S localhost:8000 -t public

//Auth::routes(['register' => false]);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('logout', [AdminController::class, 'logout']);

    // Home
    Route::get('/slider', [AdminController::class, 'slider'])->name('slider');

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

    //Order
    Route::get('order', [OrderController::class, 'order']);
    Route::get('order/view/{id}', [OrderController::class, 'orderView']);
    Route::get('order/invoice/{id}', [OrderController::class, 'pdfView']);
});

Route::resource('tag', TagController::class);