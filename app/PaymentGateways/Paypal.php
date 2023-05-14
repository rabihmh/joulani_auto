<?php

namespace App\PaymentGateways;

use App\Models\PaymentMethod;
use App\Models\Plan;

class Paypal implements PaymentGateway
{

    public Plan $plan;
    public PaymentMethod $method;

    public function __construct($method, ?Plan $plan,)
    {
        $this->plan = $plan;
        $this->method = $method;
    }

    public function create()
    {

    }

    public function verify($session_id)
    {
        // TODO: Implement verify() method.
    }

    public function formOptions(): array
    {
        // TODO: Implement formOptions() method.
    }
}
