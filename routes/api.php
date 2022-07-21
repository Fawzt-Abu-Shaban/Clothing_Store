<?php

use App\Http\Controllers\API\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('products', [ProductController::class, 'products']);
Route::get('categories', [ProductController::class, 'categories']);
Route::get('carts', [ProductController::class, 'carts']);
Route::get('discounts', [ProductController::class, 'discounts']);
Route::get('sliders', [ProductController::class, 'sliders']);
