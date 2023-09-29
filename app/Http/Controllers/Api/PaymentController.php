<?php

namespace App\Http\Controllers\Api;
use App\Services\BrainTree;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrdineEffettuato;
use Illuminate\Http\Request;
use Braintree\Transaction;
use App\Models\Order;


class PaymentController extends Controller
{
    protected $braintreeService;

    public function __construct(BrainTree $braintreeService)
    {
        $this->braintreeService = $braintreeService;
    }

    public function processPayment(Request $request){
        $amount = $request->all();
        $cardNumber = $request->input('card_number');
        $expiryDate = $request->input('expiry_date');
        $cvv = $request->input('cvv');

        $result = $this->braintreeService::sale([
            'amount' => $amount,
            'creditCard' => [
                'card_number' => $cardNumber,
                'expiry_date' => $expiryDate,
                'cvv' => $cvv
            ]
        ]);
        
        if ($result->success) {
            // Il pagamento è andato a buon fine
            $transaction = $result->transaction;
        } else {
            // C'è stato un problema con il pagamento
            $errorString = "";
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Errore: ' . $error->code . ": " . $error->message . "\n";
            }
        }
    }
}

