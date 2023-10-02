<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request){

        // RECUPERIAMO I DATI DELLA RICHIESTA DEL FORM
        $form_data = $request->all();

        // VALIDIAMO I DATI
        $validator = Validator::make($form_data,

            // PARAMETRI DI VALIDAZIONE
            [
                'name' => 'required|max:50',
                'surname' => 'required|max:50',
                'phone_number' => 'required|numeric|max_digits:10',
                'email' => 'required|email',
                'address' => 'required',

                'card_number' => 'required',
                'expiry_date' => 'required',
                'cvv' => 'required',
            ],

            // MESSAGGI DI ERRORE
            [
                'name.required' => 'Il nome è obbligatorio',
                'name.max' => 'Il nome deve avere una lunghezza massima di :max caratteri',

                'surname.required' => 'Il cognome è obbligatorio',
                'surname.max' => 'Il cognome deve avere una lunghezza massima di :max caratteri',

                'phone_number.required' => 'Il numero di telefono è obbligatorio',
                'phone_number.numeric' => 'Il numero di telefono deve essere composto soltanto da numeri',
                'phone_number.max_digits' => 'Il numero di telefono deve avere una lunghezza massima di 10 numeri',

                'email.required' => 'L\'email è obbligatoria',
                'email.email' => 'Devi inserire un\'email valida',

                'address.required' => 'L\'indirizzo di consegna è obbligatorio',

                'card_number.required' => 'Il numero della carta è obbligatorio',
                'expiry_date.required' => 'La data di scadenza è obbligatoria',
                'cvv.required' => 'Il cvv è obbligatorio',
            ]
        );

        // VERIFICHIAMO SE LA VALIDAZIONE DELLA RICHIESTA NON VA A BUON FINE
        if($validator->fails()){

            return response()->json([

                'success' => false,
                'errors'  => $validator->errors(),

                /*
                    errors() Restituisce un Array in cui: 

                    - la Chiave è il Campo in cui è presente l'Errore,
                    
                    - il Valore della Chiave è, a sua volta, un Array di Messaggi di Errore.
                */

            ]);
        }

        // VERIFICHIAMO SE I DATI DI PAGAMENTO INSERITI SONO CORRETTI
        if($form_data['card_number'] != '5370450087139650' || $form_data['expiry_date'] != '01/25' || $form_data['cvv'] != '230'){

            return response()->json([

                'success' => false,
                'payment_errors' => true,

                /*
                    errors() Restituisce un Array in cui: 

                    - la Chiave è il Campo in cui è presente l'Errore,
                    
                    - il Valore della Chiave è, a sua volta, un Array di Messaggi di Errore.
                */

            ]);
        }

        // SE L'ORDINE È ANDATO A BUON FINE, CREO UN NUOVO "ORDER" NELLA TABELLA "ORDERS" DEL DATABASE
        $newOrder = new Order();

        // INSERISCO DENTRO FORM_DATA->ORDER_STATUS LO STATO DELL'ORDINE
        $form_data['order_status'] = 'In preparazione';

        $newOrder->fill($form_data);

        $newOrder->save();

        // GESTIONE RELAZIONE MANY-TO-MANY (ORDERS - PRODUCTS)

            // RECUPERO IL CARRELLO DAL FORM_DATA E LO SALVO SU "CART"
            $cart = $form_data['cart'];

            // CICLO IL CARRELLO, PER OGNI PRODOTTO CONTENUTO NEL CARRELLO VERRA FATTA UN'ITERAZIONE
            foreach ($cart as $item) {

                // SALVO L'ID DEL PRODOTTO DENTRO "ITEM_ID"
                $itemId = $item['id'];
                
                // SALVO IL PREZZO DEL PRODOTTO DENTRO "PRICE"
                $price = $item['price'];

                // SALVO LA QUANTITA DEL PRODOTTO, SCELTA DALL'UTENTE, DENTRO "QUANTITY"
                $quantity = $item['quantity'];

                // CALCOLO IL SUB_TOTALE SPESO DALL'UTENTE, E LO SALVO SU "SUB_TOTAL"
                $subTotal = $quantity * $price;
            
                // UTLIZZO IL METODO ATTACH() PER COLLEGARE IL PRODOTTO ALL'ORDINE, CON I DATI AGGIUNTIVI "QUANTITY" E "SUB_TOTAL"
                $newOrder->products()->attach($itemId, [
                    'quantity' => $quantity,
                    'sub_total' => $subTotal,
                ]);
            }

        //

        // DIAMO UNA RISPOSTA DI BUON FINE ALL'UTENTE
        return response()->json([

            'success' => true,

        ]);
    }
}
