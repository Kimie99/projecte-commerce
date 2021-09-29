<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
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
    return redirect()->route('login');
});
Route::get('shopee', function () {
    return view('product.createProduct');
});
Route::get('mainPage', function () {
    return view('layout.main');
});
Route::get('menu', function () {
    $products = Product::get();
    return view('user.menu', compact(['products']));
});

Route::get('product/view',[\App\Http\Controllers\ProductController::class, "view"])->name('product.view');
Route::get('product/trash',[\App\Http\Controllers\ProductController::class, "trashed"])->name('product.trash');
Route::post('product/trash/{id}',[\App\Http\Controllers\ProductController::class, "restore"])->name('product.restore');
Route::post('product/delete/{id}',[\App\Http\Controllers\ProductController::class, "delete"])->name('product.delete');
Route::get('product/search/',[\App\Http\Controllers\ProductController::class, "search"])->name('product.search');
Route::get('cart', [\App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [\App\Http\Controllers\ProductController::class, 'change'])->name('update.cart');
Route::delete('remove-from-cart', [\App\Http\Controllers\ProductController::class, 'remove'])->name('remove.from.cart');

Route::resource('product',\App\Http\Controllers\ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
