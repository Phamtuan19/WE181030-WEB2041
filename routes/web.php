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

use App\Http\Controllers\admin\ImagesController;

use App\Http\Controllers\admin\DashboardController;

use App\Http\Controllers\admin\PostController;

use App\Http\Controllers\admin\SliderController;

use App\Http\Controllers\Customer\Auth\ForgotPasswordController;

use App\Http\Controllers\Customer\Auth\ResetPasswordController;

use App\Http\Controllers\Customer\Auth\RegisterController;

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

Route::get('/', function () {
    return redirect(route('store.home'));
});


Route::middleware('auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource("users", UserController::class)->except(['edit']);

        Route::resource('products', ProductController::class);

        Route::resource('categories', CategoryController::class)->except(['edit']);

        Route::resource('brand', BrandController::class)->except(['edit']);

        Route::resource('orders', OrderController::class)->except('edit', 'store');

        Route::resource('customers', CutomerController::class);

        Route::resource('posts', PostController::class);

        // View Post Content
        Route::get('post/content/{post}', [PostController::class, 'postContent'])->name('postContent');

        // xóa mềm bài viết
        Route::get('/listSoftErase', [PostController::class, 'listSoftErase'])->name('listSoftErase');

        // khôi phục bài viết đã xóa
        Route::patch('post/softErase/{post}', [PostController::class, 'postSoftErase'])->name('post_softErase');

        // thay đổi hình ảnh
        Route::patch('images/{image}', [ImagesController::class, 'updateImage'])->name('updateImage');

        Route::delete('images/{image}', [ImagesController::class, 'updateImage'])->name('updateImage');

        // update product avatar
        Route::patch('images/avatar/{image}', [ImagesController::class, 'updateAvatar'])->name('avatar');

        // Xóa mềm sản phẩm
        Route::patch('product/softErase/{product}', [ProductController::class, 'softErase'])->name('softErase');

        // khôi phục sản phẩm đã xóa
        Route::get('product/erase', [ProductController::class, 'listSoftErase'])->name('erase');

        // Danh sách pages store
        Route::get('slider', [SliderController::class, 'index'])->name('slider');
    });
});

Route::prefix('store')->name('store.')->group(function () {

    Route::get('/', [HomeController::class, 'indexHome'])->name('home');

    Route::get('products', [HomeController::class, 'indexMobile'])->name('mobile');

    Route::get('detail-product/{id}', [HomeController::class, 'indexProduct'])->name('product');

    Route::get('cart', [HomeController::class, 'indexCart'])->name('cart');

    Route::get('payment', [PaymentController::class, 'payment'])->name('payment');

    Route::post('check-order', [PaymentController::class, 'checkPayment'])->name('checkOrder');

    Route::get('order-success', [HomeController::class, 'orderSuccess'])->name('orderSuccess');

    // authentication guard Customers
    Route::get('/login', [LoginController::class, 'login'])->middleware('guest:customers')->name('login');

    Route::post('/login', [LoginController::class, 'postLogin'])->middleware('guest:customers');

    // Reset password
    Route::get('password/reset', [ForgotPasswordController::class, 'index'])->name('resetPassword');

    Route::post('password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('guest:customers')->name('postResetPassword');

    // Đăng ký
    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');

    Route::post('/logout', function () {
        Auth::guard('customers')->logout();
        return redirect()->route('store.home');
    })->middleware('auth:customers')->name('logout');
});

// Route::prefix('customers')->name('customers.')->group(function () {
//     Route::get('/login', [LoginController::class, 'login'])->middleware('guest:customers')->name('login');

//     Route::post('/login', [LoginController::class, 'postLogin'])->middleware('guest:customers');

//     Route::post('/logout', function () {
//         Auth::guard('customers')->logout();
//         return redirect()->route('store.home');
//     })->middleware('auth:customers')->name('logout');
// });
