<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    
        public function index(){
            $resturants = Restaurant::all();
            return response()->json([
                'success'   => true,
                'results'   => $resturants
            ]);
        }
    
}
