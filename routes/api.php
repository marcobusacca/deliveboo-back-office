<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\TypeController as TypeController;

use App\Http\Controllers\Api\RestaurantController as RestaurantController;

use App\Http\Controllers\Api\OrderController as OrderController;

use App\Http\Controllers\Api\LeadController as LeadController;

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


// GET_RESTAURANT_TYPES
Route::get('/types', [TypeController::class, 'index']);


// GET_ALL_RESTAURANTS
Route::get('/restaurants', [RestaurantController::class, 'index']);

// GET_FILTERED_RESTAURANTS
Route::get('/restaurants/{typeIds}', [RestaurantController::class, 'filterRestaurants']);

// GET_RESTAURANT_PRODUCTS
Route::get('/restaurants/{slug}/products', [RestaurantController::class, 'show']);


// ORDER-PAYMENT API POST
Route::post('/order/payment', [OrderController::class, 'store']);

// MAIL TRAP API POST
Route::post('/contacts', [LeadController::class, 'store']);