<?php

namespace App\Services;
use Braintree\Gateway;
use Illuminate\Support\Facades\Config;

class BraintreeService
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => Config::get('services.braintree.environment'),
            'merchantId' => Config::get('services.braintree.merchant_id'),
            'publicKey' => Config::get('services.braintree.public_key'),
            'privateKey' => Config::get('services.braintree.private_key')
        ]);
    }
}
