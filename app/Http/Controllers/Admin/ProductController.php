<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->route('admin.restaurants.create')->with('error', "Operazione non autorizzata");
        }

        $products = Product::where('restaurant_id', $restaurant_id)->orderBy('name')->get();

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
        // RECUPERO L'UTENTE ATTUALMENTE AUTENTICATO
        $user = auth()->user();

        // RECUPERO IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO
        $restaurant = $user->restaurant;

        // CONTROLLO SE, IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO, POSSIEDE ALMENO UN PRODOTTO
        if(isset($restaurant->products)){

            // CONTROLLO SE, IL PRODUCT CHE MI è STATO PASSATO, è UN PRODUCT APPARTENENTE AL RESTAURANT ATTUALMENTE AUTENTICATO
            if($restaurant->products->contains($product)){

                // RITORNO LA SHOW DEL PRODUCT
                return view('admin.products.show', compact('product'));

            } else{

                // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
                return redirect()->back()->with('error', "Operazione non autorizzata");
            }

        } else{
            // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
            return redirect()->back()->with('error', "Operazione non autorizzata");
        }
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

            // REDIRECTO L'UTENTE ALLA CREATE DEL RISTORANTE
            return redirect()->route('admin.restaurants.create')->with('error', "Operazione non autorizzata");
        }

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

        return redirect()->route('admin.products.show', compact('product'))->with('message', "Prodotto: '$name' aggiunto correttamente");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // RECUPERO L'UTENTE ATTUALMENTE AUTENTICATO
        $user = auth()->user();

        // RECUPERO IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO
        $restaurant = $user->restaurant;

        // CONTROLLO SE, IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO, POSSIEDE ALMENO UN PRODOTTO
        if(isset($restaurant->products)){

            // CONTROLLO SE, IL PRODUCT CHE MI è STATO PASSATO, è UN PRODUCT APPARTENENTE AL RESTAURANT ATTUALMENTE AUTENTICATO
            if($restaurant->products->contains($product)){
    
                // RITORNO LA EDIT DEL PRODUCT
                return view('admin.products.edit', compact('product'));
    
            } else{
    
                // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
                return redirect()->back()->with('error', "Operazione non autorizzata");
            }

        } else{
            // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
            return redirect()->back()->with('error', "Operazione non autorizzata");
        }
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

        return redirect()->route('admin.products.show', compact('product'))->with('message', "Prodotto: '$name' modificato correttamente");
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

        return redirect()->route('admin.products.index')->with('message', "Prodotto: '$name' cancellato correttamente");
    }

    public function deleteCoverImage(Product $product)
    {
        if($product->cover_image){

            Storage::delete($product->cover_image);

            $product->cover_image = NULL;

            $product->update();
        }
        
        return redirect()->route('admin.products.edit', compact('product'))->with('message', "Immagine cancellata correttamente");
    }
}
