<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Type;

class RestaurantController extends Controller
{
    public function index(){

        // RECUPERO TUTTI I RISTORANTI CON LE TIPOLOGIE ASSOCIATE
        $restaurants = Restaurant::with('types')->get();

        return response()->json([
            'success'   => true,
            'results'   => $restaurants
        ]);
    }

    public function filterRestaurants($typeIds) {

        /*
        $typeIds mi restituisce una stringa composta dagli ID delle Tipologie selezionate dall'utente -> Es. "1,2,3"

        Tramite la funzione "explode", faccio diventare questa stringa un array ($typeIdsArray):
        ogni volta che il programma trova una virgola dentro la stringa $typeIds, 
        divide i due elementi e li salva nell'array -> Es. "1,2,3" diventa -> [1, 2, 3]
        */
        $typeIdsArray = explode(',', $typeIds);


        /*
        Effettuiamo una query dove ricerchiamo i ristoranti, includendo anche le tipologie di questi ristoranti
        tramite l'Eager Loading (::with('types)), che hanno una relazione con TUTTE le tipologie selezionate dall'utente
        */
        $restaurants = Restaurant::with('types')->whereHas('types', function($query) use ($typeIdsArray) {
            
            $query->whereIn('type_id', $typeIdsArray);

        }, '=', count($typeIdsArray))->get();
    
        return response()->json([
            'success' => true,
            'results' => $restaurants
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
