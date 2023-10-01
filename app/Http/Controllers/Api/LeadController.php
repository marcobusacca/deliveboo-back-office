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

        // SALVO I DATI NEL DATABASE
        $newLead = new Lead();

        $newLead->fill($form_data);

        $newLead->save();

        // INVIO LA MAIL
        Mail::to('hello@example.com')->send(new NewContact($newLead));
    }
}