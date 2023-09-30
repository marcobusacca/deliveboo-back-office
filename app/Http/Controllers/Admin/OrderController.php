<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
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

        $orders = Order::where('restaurant_id', $restaurant_id)->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // RECUPERO L'UTENTE ATTUALMENTE AUTENTICATO
        $user = auth()->user();

        // RECUPERO IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO
        $restaurant = $user->restaurant;

        // CONTROLLO SE, IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO, POSSIEDE ALMENO UN ORDINE
        if(isset($restaurant->orders)){

            // CONTROLLO SE, L'ORDER CHE MI è STATO PASSATO, è UN ORDER APPARTENENTE AL RESTAURANT ATTUALMENTE AUTENTICATO
            if($restaurant->orders->contains($order)){

                // RITORNO LA SHOW DELL' ORDER
                return view('admin.orders.show', compact('order'));

            } else{

                // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
                return redirect()->back()->with('error', "Operazione non autorizzata");
            }

        } else{
            // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
            return redirect()->back()->with('error', "Operazione non autorizzata");
        }
    }
}
