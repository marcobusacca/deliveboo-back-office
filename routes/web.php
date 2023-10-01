<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as DashboardController;

use App\Http\Controllers\Admin\RestaurantController as RestaurantController;

use App\Http\Controllers\Admin\ProductController as ProductController;

use App\Http\Controllers\Admin\OrderController as OrderController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // ADMIN DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // RESTAURANTS RESOURCE
    Route::resource('restaurants', RestaurantController::class);

    // PRODUCTS RESOURCE
    Route::resource('products', ProductController::class);

    // ORDERS RESOURCE
    Route::resource('orders', OrderController::class);

    // ORDERS STATISTICS
    Route::get('/statistics', [OrderController::class, 'statisticsIndex'])->name('orders.statistics');

    // RESTAURANTS EDIT: DELETE-COVER-IMAGE
    Route::get('/restaurants/{restaurant}/edit/delete-cover-image', [RestaurantController::class, 'deleteCoverImage'])->name('restaurants.edit.delete-cover-image');

    // PRODUCTS EDIT: DELETE-COVER-IMAGE
    Route::get('/products/{product}/edit/delete-cover-image', [ProductController::class, 'deleteCoverImage'])->name('products.edit.delete-cover-image');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';