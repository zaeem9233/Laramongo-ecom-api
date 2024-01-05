<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategorySubController;
use App\Http\Controllers\Api\CategorySubSubController;
use App\Http\Controllers\Api\ColourController;
use App\Http\Controllers\Api\CoupenController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', [AuthController::class, 'login'])->name('api.login');

Route::resource('brand', BrandController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('category', CategoryController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('sub_category', CategorySubController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('sub_sub_category', CategorySubSubController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('colour', ColourController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('coupen', CoupenController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('product', ProductController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::get('cart/{user}', [CartController::class, 'view'])->name('cart.view');
Route::resource('cart', CartController::class)->only(['store', 'update', 'destroy']);

Route::get('wishlist/{userId}', [WishlistController::class, 'index'])->name('wishlist.index');
Route::resource('wishlist', WishlistController::class)->only(['store', 'destroy']);

Route::get('review/{userId}', [ReviewController::class, 'index'])->name('review.index');
Route::resource('review', ReviewController::class)->only(['store', 'update', 'destroy']);