<?php

use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes CodelinStore E-Commerce
|--------------------------------------------------------------------------|
*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewCategory']);
Route::get('view-category/{category_slug}/{product_slug}', [FrontendController::class, 'viewProduct']);

Auth::routes();
Route::get('load-cart-count', [CartController::class,'cartCount']);
Route::get('load-wishlist-count', [CartController::class,'wishlistCount']);

// Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('index');
Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::post('delete-to-cart', [CartController::class, 'deleteToCart']);
Route::post('update-to-cart', [CartController::class, 'updateToCart']);

Route::post('add-to-wishlist', [WishlistController::class,'addToWishlist']);
Route::post('delete-to-wishlist', [WishlistController::class,'deleteToWishlist']);
Route::put('update-payment/{id}', [OrderController::class, 'payment']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    // wishlist
    Route::get('wishlist', [WishlistController::class,'index']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [AdminFrontendController::class, 'index']);
    Route::get('profile', [AdminFrontendController::class, 'viewProfile']);

    // categories
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('create-category', [CategoryController::class, 'create']);
    Route::post('insert-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    // products
    Route::get('products', [ProductController::class, 'index']);
    Route::get('create-product', [ProductController::class, 'create']);
    Route::post('insert-product', [ProductController::class, 'store']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    // orderProducts -> userOrder
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);
    // Route::put('update-payment/{id}', [OrderController::class, 'payment']);
    Route::get('order-history', [OrderController::class, 'orderHistory']);

    // fetchUsersData
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUsers']);
});
