<?php

namespace App\Services\Paypal;

use App\Models\PaymentMethod;
use App\Models\Subscription;

class PaypalSubscription
{
    public function __construct(PaymentMethod $method, Subscription $subscription)
    {
        $this->method = $method;
        $this->subscription = $subscription;
    }

    public function cancel()
    {

    }
}
