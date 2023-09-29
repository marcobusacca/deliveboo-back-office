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
    public function processPayment(Request $request){
        
    }
}

