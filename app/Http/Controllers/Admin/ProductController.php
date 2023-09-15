<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
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

            // OTTENGO L'ID DEL RISTORANTE ASSOCIATO ALL'UTENTE
            $restaurant_id = $user->restaurant->id;
        }
        else{ // L'UTENTE NON HA UN RISTORANTE
            
            // REDIRECTO L'UTENTE ALLA CREATE DEL RISTORANTE
            return redirect()->route('admin.restaurants.index');
        }

        $products = Product::where('restaurant_id', $restaurant_id);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $form_data = $request->all();

        // GESTIONE UPLOAD DEI FILE (COVER_IMAGE)

            if($request->hasFile('cover_image')){
                    
                $img_path = Storage::put('products_images', $request->cover_image);
                
                $form_data['cover_image'] = $img_path;
            }
        //

        // GESTIONE RELAZIONE ONE-TO-MANY (RESTAURANTS - PRODUCTS)
        
            $user = auth()->user();
            
            $form_data['restaurant_id'] = $user->restaurant->id;
        
        //

        $product = new Product();

        $product->fill($form_data);

        $product->save();

        $name = $product->name;

        return redirect()->route('admin.products.show', compact('product'))->with('message', "Prodotto : '$product' Aggiunto Correttamente");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $form_data = $request->all();

        // GESTIONE UPLOAD DEI FILE (COVER_IMAGE)

            if($request->hasFile('cover_image')){

                if($product->cover_image){

                    Storage::delete($product->cover_image);
                }
                
                $img_path = Storage::put('products_images', $request->cover_image);
                
                $form_data['cover_image'] = $img_path;
            }

        //

        $name = $product->name;

        $product->update($form_data);

        return redirect()->route('admin.products.show', compact('product'))->with('message', "Prodotto : '$name' Modificato Correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // GESTIONE CANCELLAZIONE DEI FILE (COVER_IMAGE)

            if($product->cover_image){

                Storage::delete($product->cover_image);
            }

        //
        $name = $product->name;

        $product->delete();

        return redirect()->route('admin.products.index')->with('message', "Prodotto : '$name' Cancellato Correttamente");
    }
}
