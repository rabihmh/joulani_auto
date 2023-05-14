<?php

namespace App\PaymentGateways;

use App\Models\PaymentMethod;
use App\Models\Plan;
use Exception;
use Illuminate\Support\Str;

class PaymentGatewayFactory
{
    /**
     * @param string $name
     * @param Plan|null $plan
     * @param PaymentMethod $method
     * @return PaymentGateway
     * @throws Exception
     */
    public static function create(string $name, PaymentMethod $method, ?Plan $plan = null): PaymentGateway
    {
        $class = 'App\PaymentGateways\\' . Str::studly($name);
        try {

            return new $class($method, $plan);

        } catch (Exception) {
            throw  new Exception("Payment gateway $name not found");
        }
    }
}
