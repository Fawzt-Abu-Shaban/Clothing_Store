<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', [SiteController::class, 'index'])->name('website.index');

    Route::get('/category/{slug}', [SiteController::class, 'category'])->name('website.category');
    Route::get('/product/{slug}', [SiteController::class, 'product'])->name('website.product');
    Route::post('/product/buy', [SiteController::class, 'buy'])->middleware('auth')->name('website.buy');
    Route::delete('/cartremoved/{id}', [SiteController::class, 'cartremoved'])->name('website.cartremoved');
    Route::get('/checkout', [SiteController::class, 'checkout'])->name('website.checkout');
    Route::post('/payment', [SiteController::class, 'payment'])->name('website.payment');
    Route::get('/search', [SiteController::class, 'search'])->name('website.search');
    Route::get('/contact_us', [SiteController::class, 'contact_us'])->name('website.contact_us');
    Route::get('/about_us', [SiteController::class, 'about_us'])->name('website.about_us');
    Route::get('/allproduct', [SiteController::class, 'allproduct'])->name('website.allproduct');
    Route::get('/cart', [SiteController::class, 'cart'])->name('website.cart');
    Route::get('/wishlist', [SiteController::class, 'wishlist'])->name('website.wishlist');
    Route::get('/delete_all', [SiteController::class, 'delete_all'])->name('website.delete_all');

    Route::get('success', function () {
        return 'Done';
    })->name('success');

    Route::get('fail', function () {
        return 'Fail';
    })->name('fial');

    Route::prefix('admin')->name('admin.')->middleware('auth', 'verified', 'isAdmin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('categories', CategoriesController::class);
        Route::resource('discounts', DiscountController::class);
        Route::resource('products', ProductController::class);
        Route::resource('sliders', SliderController::class);
    });


    Auth::routes(['verify' => true]);
    // في حالة ما بدنا اي شي من تسجيل الدخول مثلا ['register'=>false]

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
