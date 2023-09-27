<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($restaurant_id){

        $products = Product::where('restaurant_id', $restaurant_id)->get();
        
        return response()->json([
            'success'   => true,
            'results'   => $products
        ]);
    }
}
