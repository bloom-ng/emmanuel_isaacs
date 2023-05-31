<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LogController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\UserCartsController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\UserOrdersController;
use App\Http\Controllers\Api\UserReviewsController;
use App\Http\Controllers\Api\ProductReviewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        // User Carts
        Route::get('/users/{user}/carts', [
            UserCartsController::class,
            'index',
        ])->name('users.carts.index');
        Route::post('/users/{user}/carts', [
            UserCartsController::class,
            'store',
        ])->name('users.carts.store');

        // User Orders
        Route::get('/users/{user}/orders', [
            UserOrdersController::class,
            'index',
        ])->name('users.orders.index');
        Route::post('/users/{user}/orders', [
            UserOrdersController::class,
            'store',
        ])->name('users.orders.store');

        // User Reviews
        Route::get('/users/{user}/reviews', [
            UserReviewsController::class,
            'index',
        ])->name('users.reviews.index');
        Route::post('/users/{user}/reviews', [
            UserReviewsController::class,
            'store',
        ])->name('users.reviews.store');

        Route::apiResource('carts', CartController::class);

        Route::apiResource('categories', CategoryController::class);

        Route::apiResource('logs', LogController::class);

        Route::apiResource('orders', OrderController::class);

        Route::apiResource('order-items', OrderItemController::class);

        Route::apiResource('products', ProductController::class);

        // Product Reviews
        Route::get('/products/{product}/reviews', [
            ProductReviewsController::class,
            'index',
        ])->name('products.reviews.index');
        Route::post('/products/{product}/reviews', [
            ProductReviewsController::class,
            'store',
        ])->name('products.reviews.store');

        Route::apiResource('settings', SettingController::class);

        Route::apiResource('reviews', ReviewController::class);

        Route::apiResource('contents', ContentController::class);
    });

    Route::apiResource('contacts', ContactController::class);
