<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        $orders = Order::where('restaurant_id', $restaurant_id)->orderByDesc('created_at')->get();

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

    public function statisticsIndex()
    {
        // RECUPERO L'UTENTE ATTUALMENTE AUTENTICATO
        $user = auth()->user();

        // RECUPERO IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO
        $restaurant = $user->restaurant;

        // CONTROLLO SE, IL RISTORANTE COLLEGATO ALL'UTENTE ATTUALMENTE AUTENTICATO, POSSIEDE ALMENO UN ORDINE
        if(isset($restaurant->orders) && count($restaurant->orders) != 0){

            $months = [];

            for ($i = 1; $i <= 12; $i++) {
                $monthDate = Carbon::createFromDate(2023, $i, 1);
                $months[] = $monthDate->format('Y-m');
            }

            $orderData = Order::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->where('restaurant_id', $restaurant->id)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->pluck('total', 'month');

            $orderCounts = [];

            foreach ($months as $month) {
                $orderCounts[] = $orderData[$month] ?? 0;
            }

            // RITORNO LA SHOW DELL' ORDER
            return view('admin.orders.statistics', compact('months', 'orderCounts'));

        } else{
            // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
            return redirect()->back()->with('error', "Il tuo ristorante non ha ancora ricevuto ordini");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
        return redirect()->back()->with('error', "Operazione non autorizzata");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
        return redirect()->back()->with('error', "Operazione non autorizzata");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
        return redirect()->back()->with('error', "Operazione non autorizzata");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
        return redirect()->back()->with('error', "Operazione non autorizzata");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // RIMANDO L'UTENTE NELLA PAGINA DI PARTENZA
        return redirect()->back()->with('error', "Operazione non autorizzata");
    }
}
