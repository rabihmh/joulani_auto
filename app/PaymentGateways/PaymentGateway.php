<?php

namespace App\PaymentGateways;

use App\Models\PaymentMethod;
use App\Models\Plan;

interface PaymentGateway
{
    public function __construct(?PaymentMethod $method, ?Plan $plan,);

    public function create();

    public function verify($data);

    public function formOptions(): array;
}
