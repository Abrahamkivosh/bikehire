<?php

use App\Http\Controllers\PageController;
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

Route::get('/',[PageController::class,'index']);

Route::get('/bike/{bike}',[PageController::class,'show'])->name('bike.show');
Route::post('cart/add/{bike}',[PageController::class,'addToCart'])->name('cart.add');
Route::get('cart',[PageController::class,'cart'])->name('cart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('admin.home');
    Route::resource('brands', App\Http\Controllers\BrandController::class);
    Route::resource('bikes', App\Http\Controllers\BikeController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('books', App\Http\Controllers\BookController::class);
    Route::get('books/{book}/approve', [App\Http\Controllers\BookController::class, 'bookApprove'])->name('books.approve');
    Route::get('books/{book}/reject', [App\Http\Controllers\BookController::class, 'bookReject'])->name('books.reject');
    Route::get('books/{book}/cancel', [App\Http\Controllers\BookController::class, 'bookCancel'])->name('books.cancel');
    Route::get('books/{book}/complete', [App\Http\Controllers\BookController::class, 'bookComplete'])->name('books.complete');

});

Route::middleware(['auth'])->prefix('customer')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'indexCustomer'])->name('customer.home');
    Route::get('bikes/bookings', [App\Http\Controllers\BookController::class, 'bikeBookings'])->name('bikes.bookings');
    Route::get('bookings/checkout', [App\Http\Controllers\BookController::class, 'checkout'])->name('bookings.checkout');
    Route::post('bookings/checkout', [App\Http\Controllers\BookController::class, 'checkoutStore'])->name('bookings.checkout.store');

    Route::get('user/{user}/edit', [App\Http\Controllers\UserController::class, 'editUser'])->name('user.edit');
    Route::put('user/{user}/update', [App\Http\Controllers\UserController::class, 'updateUser'])->name('user.update');
});