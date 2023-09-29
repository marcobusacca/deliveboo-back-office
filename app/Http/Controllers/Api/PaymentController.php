<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrdineEffettuato;
use Illuminate\Http\Request;
use Braintree\Transaction;
use App\Models\Order;


class PaymentController extends Controller
{
    public function processPayment(Request $request){
        $nonceFromTheClient = $request->input('payment_method_nonce');
        $importoPagamento = request('importo');

        $result = Transaction::sale([
            'amount' => $importoPagamento,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // Invia una mail all'utente che ha inserito l'indirizzo email nel form
            Mail::to($request->input('email'))->send(new OrdineEffettuato($request->input('email')));

            $order = Order::create([]);

            return response()->json(['success' => true, 'message' => 'Pagamento completato']);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}

