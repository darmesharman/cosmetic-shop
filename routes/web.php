<?php

use Illuminate\Support\Facades\Route;

use App\Models\Order;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return redirect()->route('products.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

Route::get('/cart', [OrderController::class, 'cart'])->name('cart');

Route::resource('admin/roles', RoleController::class);
Route::resource('admin/users', UserController::class);
Route::resource('admin/categories', CategoryController::class);

Route::get('admin', function () {
    return view('admin.index');
})->name('admin.index');


