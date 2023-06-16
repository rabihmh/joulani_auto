<?php

namespace App\Services\Paypal;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaypalWebhook
{
    public function handle(PaymentMethod $method, Request $request)
    {
    }
}
