<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
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
            
            // REDIRECTO L'UTENTE ALLA CREATE
            return redirect()->route('admin.restaurants.create');
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
        // RECUPERO L'UTENTE ATTUALMENTE AUTENTICATO
        $user = auth()->user();

        // CONTROLLO SE L'UTENTE NON HA UN RISTORANTE
        if(!isset($user->restaurant)){

            // LA VARIABILE "RESTAURANT" è UN ARRAY VUOTO
            $restaurant = [];
        }
        else{ // L'UTENTE HA UN RISTORANTE
            
            // REDIRECTO L'UTENTE ALLA INDEX
            return redirect()->route('admin.restaurants.index');
        }

        // IMPORTO TUTTE LE TIPOLOGIE
        $types = Type::all();

        return view('admin.restaurants.create', compact('restaurant', 'types'));
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
        
        // GESTIONE RELAZIONE ONE-TO-ONE (USERS - RESTAURANTS)
        
            $user = auth()->user();
            
            $form_data['user_id'] = $user->id;
        
        //

        $restaurant = new Restaurant();

        $form_data['slug'] = $restaurant->generateSlug($form_data['name']);

        $restaurant->fill($form_data);

        $restaurant->save();

        // GESTIONE RELAZIONE MANY-TO-MANY (RESTAURANTS - TYPES)

            if ($request->has('types')){
                
                $restaurant->types()->attach($request->types);
            }

        //

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
        // IMPORTO TUTTE LE TIPOLOGIE
        $types = Type::all();

        return view('admin.restaurants.edit', compact('restaurant', 'types'));
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
        $form_data = $request->all();

        // GESTIONE UPLOAD DEI FILE (COVER_IMAGE)

            if($request->hasFile('cover_image')){

                if($restaurant->cover_image){

                    Storage::delete($restaurant->cover_image);
                }
                
                $img_path = Storage::put('restaurants_images', $request->cover_image);
                
                $form_data['cover_image'] = $img_path;
            }

        //

        $form_data['slug'] = $restaurant->generateSlug($form_data['name']);

        $name = $restaurant->name;

        $restaurant->update($form_data);

        // GESTIONE RELAZIONE MANY-TO-MANY (RESTAURANTS - TYPES)

            if ($request->has('types')){
                    
                $restaurant->types()->sync($request->types);
            }

        //

        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Ristorante : '$name' Modificato Correttamente");
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

    public function deleteCoverImage(Restaurant $restaurant)
    {
        if($restaurant->cover_image){

            Storage::delete($restaurant->cover_image);

            $restaurant->cover_image = NULL;

            $restaurant->update();
        }
        
        return redirect()->route('admin.restaurants.edit', compact('restaurant'));
    }
}
