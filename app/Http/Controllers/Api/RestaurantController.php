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

        public function show($type_id){
            $type = Type::where('id', $type_id)->firstOrFail();
            $restaurants = $type->restaurants->unique();
            return response()->json([
                'success' => true,
                'results' => $restaurants
            ]);
        }
        
        
    
}
