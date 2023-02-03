<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

// Customer controllers
use App\Http\Controllers\Customer\HomeController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\Auth\LoginController;

use App\Http\Controllers\Customer\PaymentController;

use App\Http\Controllers\admin\OrderController;

use App\Http\Controllers\admin\CutomerController;

use Illuminate\Http\Request;

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


Route::middleware('auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource("users", UserController::class)->except(['edit']);

        Route::resource('products', ProductController::class);

        Route::resource('category', CategoryController::class)->except(['edit']);

        Route::resource('brand', BrandController::class)->except(['edit']);

        Route::resource('orders', OrderController::class)->except('edit', 'store');

        Route::get('customers', [CutomerController::class, 'index'])->name('customers');
    });
});

Route::prefix('store')->name('store.')->group(function () {

    Route::get('/', [HomeController::class, 'indexHome'])->name('home');

    Route::get('products', [HomeController::class, 'indexMobile'])->name('mobile');

    Route::get('detail-product/{id}', [HomeController::class, 'indexProduct'])->name('product');

    Route::get('cart', [HomeController::class, 'indexCart'])->name('cart');

    // Route::middleware('guest:customers')->group(function () {
        Route::get('payment', [PaymentController::class, 'payment'])->name('payment');

        Route::post('check-order', [PaymentController::class, 'checkPayment'])->name('checkOrder');

        Route::get('order-success', [HomeController::class, 'orderSuccess'])->name('orderSuccess');
    // });
});

Route::prefix('customers')->name('customers.')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->middleware('guest:customers')->name('login');

    Route::post('/login', [LoginController::class, 'postLogin'])->middleware('guest:customers');

    Route::post('/logout', function () {
        Auth::guard('customers')->logout();
        return redirect()->route('store.home');
    })->middleware('auth:customers')->name('logout');
});
