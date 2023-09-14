<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // RECUPERO L'UTENTE ATTUALMENTE AUTENTICATO
        $user = auth()->user();

        // CONTROLLO SE L'UTENTE HA UN RISTORANTE
        if(isset($user->restaurant)){

            // OTTENGO IL RISTORANTE ASSOCIATO ALL'UTENTE
            $restaurant = $user->restaurant;
        }
        else{ // L'UTENTE NON HA UN RISTORANTE
            
            // LA VARIABILE "RESTAURANT" è UN ARRAY VUOTO
            $restaurant = [];
        }
        
        return view('admin.restaurants.index', compact('restaurant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->all();

        // GESTIONE UPLOAD DEI FILE (COVER_IMAGE)

            if($request->hasFile('cover_image')){
                    
                $img_path = Storage::put('restaurants_images', $request->cover_image);
                
                $form_data['cover_image'] = $img_path;
            }
        //

        $restaurant = new Restaurant();

        // GESTIONE RELAZIONE ONE-TO-ONE (USERS - RESTAURANTS)

            $user = auth()->user();

            $form_data['user_id'] = $user->id;

        // FINE GESTIONE RELAZIONE ONE-TO-ONE

        $form_data['slug'] = $restaurant->generateSlug($form_data['name']);

        $restaurant->fill($form_data);

        $restaurant->save();

        $name = $restaurant->name;

        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Ristorante : '$name' Creato Correttamente");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
