<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StoreCartController;
use App\Http\Controllers\StoreCheckoutController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'index'])->name('about');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

// Store

Route::get('cart', [StoreCartController::class, 'index'])->name('store.cart');
Route::get('checkout', [StoreCheckoutController::class, 'index'])->name('store.checkout');

// About

Route::get('about', function() {
    return view('about');
})->name('about');

// Admin

Route::get('/admin/home', [AdminDashboardController::class, 'index'])->name('admin.home');
Route::prefix('/admin')
    ->middleware('auth')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('carts', CartController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('logs', LogController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('order-items', OrderItemController::class);
        Route::resource('products', ProductController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('reviews', ReviewController::class);
        Route::resource('contents', ContentController::class);
    });
