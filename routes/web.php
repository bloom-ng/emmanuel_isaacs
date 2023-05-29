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
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::put('register', [AuthController::class, 'registerUser'])->name('user.register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth']);

Route::get('profile', [AuthController::class, 'profile'])->name('user.profile')
                                                                 ->middleware(['auth']);
Route::put('profile', [AuthController::class, 'profileUpdate'])->name('user.profile-update')
                                                                 ->middleware(['auth']);
Route::put('profile/password', [AuthController::class, 'passwordUpdate'])->name('user.password.update')
                                                                 ->middleware(['auth']);
// Store

Route::get('cart', [StoreCartController::class, 'index'])->name('store.cart');
Route::get('checkout', [StoreCheckoutController::class, 'index'])->name('store.checkout')
                                                                 ->middleware(['auth']);

Route::post('checkout', [StoreCheckoutController::class, 'initiatePayment'])->name('payment.initiate')
                                                                            ->middleware(['auth']);

Route::get('/payment/verify', [StoreCheckoutController::class, 'verify'])->name('payment.verify');
Route::get('/order/success/{order}', [StoreCheckoutController::class, 'paymentSuccess'])->name('order.success');
Route::get('/order/failed/{order}', [StoreCheckoutController::class, 'paymentFailed'])->name('order.failed');

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
