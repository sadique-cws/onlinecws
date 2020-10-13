<?php

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

Route::get('/', [App\Http\Controllers\User::class,"index"])->name("homepage");
Route::get('/c/{id}', [App\Http\Controllers\User::class,"course"])->name("singleCourse");
Route::get('/cart', [App\Http\Controllers\User::class,"cart"])->name("cart")->middleware("auth");
Route::get('/checkout', [App\Http\Controllers\User::class,"checkout"])->name("checkout")->middleware("auth");
Route::post('/add-coupon', [App\Http\Controllers\User::class,"addCoupon"])->name("addCoupon")->middleware("auth");
Route::get('/remove-coupon', [App\Http\Controllers\User::class,"removeCoupon"])->name("removeCoupon")->middleware("auth");
Route::get('/add-to-cart/{c_id}', [App\Http\Controllers\User::class,"addToCart"])->name("addCart")->middleware("auth");
Route::get('/remove-from-cart/{c_id}', [App\Http\Controllers\User::class,"removeFromCart"])->name("removeCart")->middleware("auth");

Auth::routes();

Route::prefix("admin")->group(function(){
    Route::get('/add-course', [App\Http\Controllers\Admin::class,"addCourse"])->name("addCourse");
    Route::post('/add-course-work', [App\Http\Controllers\Admin::class,"addCourseWork"])->name("addCourseWork");
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
