<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController as LeadController;
use App\Http\Controllers\Api\TypeController as TypeController;
use App\Http\Controllers\Api\RestaurantController as RestaurantController;


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
Route::get('/types', [TypeController::class, 'index']);
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/types/{type_id}', [RestaurantController::class, 'show']);