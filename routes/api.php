<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategorySubController;
use App\Http\Controllers\Api\ColourController;
use App\Http\Controllers\Api\CoupenController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('brand', BrandController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('category', CategoryController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('sub_category', CategorySubController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('colour', ColourController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('coupen', CoupenController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::resource('product', ProductController::class)->only(['index', 'store', 'show', 'update', 'destroy']);