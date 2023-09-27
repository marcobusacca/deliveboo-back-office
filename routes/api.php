<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController as LeadController;
use App\Http\Controllers\Api\TypeController as TypeController;
use App\Http\Controllers\Api\RestaurantController as RestaurantController;
use App\Http\Controllers\Api\ProductController as ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contacts', [LeadController::class, 'store']);

// GET_RESTAURANT_TYPES
Route::get('/types', [TypeController::class, 'index']);

// GET_ALL_RESTAURANTS
Route::get('/restaurants', [RestaurantController::class, 'index']);

// GET_FILTERED_RESTAURANTS
Route::get('/restaurants/{typeIds}', [RestaurantController::class, 'filterRestaurants']);

// GET RESTAURANTS WITH PRODUCTS
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);


Route::get('/restaurants/{restaurant_id}/products', [ProductController::class, 'index']);