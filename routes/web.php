<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CartProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\FavoriteProductController;
use App\Http\Controllers\Admin\LoyaltyProgramController;
use App\Http\Controllers\Admin\OrderBonusController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderProductController;
use App\Http\Controllers\Admin\ProductCardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\PromotionProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', \App\Http\Controllers\Auth\IsAdmin::class]], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD маршруты
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('product-cards', ProductCardController::class);
    Route::resource('product-photos', ProductPhotoController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('tags', TagController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-products', OrderProductController::class);
    Route::resource('carts', CartController::class);
    Route::resource('cart-products', CartProductController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('promocodes', PromoCodeController::class);
    Route::resource('promotion-products', PromotionProductController::class);
    Route::resource('favorites', FavoriteController::class);
    Route::resource('favorite-products', FavoriteProductController::class);
    Route::resource('loyalty-programs', LoyaltyProgramController::class);
    Route::resource('order-bonuses', OrderBonusController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('statuses', StatusController::class);

});

Auth::routes();

Route::get(' / home)', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
