<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{
    public function store(Request $request){

        // RECUPERIAMO I DATI DELLA RICHIESTA DEL FORM
        $form_data = $request->all();

        // VALIDIAMO I DATI SENZA UTILIZZARE STORE_REQUEST
        $validator = Validator::make($form_data, [

            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
        ]);

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

        // SALVO I DATI NEL DATABASE
        $newLead = new Lead();

        $newLead->fill($form_data);

        $newLead->save();

        // INVIO LA MAIL
        Mail::to('hello@example.com')->send(new NewContact($newLead));

        // DIAMO UNA RISPOSTA ALL'UTENTE
        return response()->json([

            'success' => true,
            'results' => 'Il messaggio è andato a buon fine'

        ]);
    }
}