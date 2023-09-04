<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::get('/admin', function (){
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('products/{id}', [\App\Http\Controllers\ProductDetailController::class, 'index'])->name('products.detail');
Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('addToCart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::get('upNumber/{id}', [\App\Http\Controllers\CartController::class, 'upNumber'])->name('upNumber');
Route::get('downNumber/{id}', [\App\Http\Controllers\CartController::class, 'downNumber'])->name('downNumber');
Route::get('removeProduct/{id}', [\App\Http\Controllers\CartController::class, 'removeProduct'])->name('removeProduct');
Route::get('checkout', [\App\Http\Controllers\CheckOutController::class, 'index'])->name('checkout');
Route::post('checkout/create' , [\App\Http\Controllers\CheckOutController::class, 'store'])->name('checkout.store');
Route::get('/filter', [ProductController::class, 'filterByCategory'])->name('products.filter');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');;


