<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

// Customer controllers
use App\Http\Controllers\Customer\HomeController;

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



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource("users", UserController::class)->except(['edit']);
    Route::resource('product', ProductController::class)->except(['edit']);
    Route::resource('category', CategoryController::class)->except(['edit']);
    Route::resource('brand', BrandController::class)->except(['edit']);
});

Route::get('/', function () {
    return redirect(route('admin.users'));
});

Route::prefix('store')->name('store.')->group(function () {
    Route::get('home', [HomeController::class, 'indexHome'])->name('home');
    Route::get('mobile', [HomeController::class, 'indexMobile'])->name('mobile');
    Route::get('mobile/{name}/{id}', [HomeController::class, 'indexProduct'])->name('page_product');
    Route::get('cart', [HomeController::class, 'indexCart'])->name('cart');
});
