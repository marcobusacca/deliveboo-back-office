<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Type;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with('types')->get();
        return response()->json([
            'success'   => true,
            'results'   => $restaurants
        ]);
    }

    
    public function show($slug){
        $restaurants = Restaurant::with('products')->where('slug', $slug)->first();
        return response()->json([
            'success'   => true,
            'results'   => $restaurants
        ]);
    }
}
