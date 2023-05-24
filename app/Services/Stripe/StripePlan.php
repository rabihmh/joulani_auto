<?php

namespace App\Services\Stripe;

use App\Models\PaymentMethod;
use Stripe\Exception\ApiErrorException;
use Stripe\Plan;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripePlan
{
    public array $data;
    public PaymentMethod $method;
    private string $secret_key;


    public function __construct(array $data, PaymentMethod $method)
    {
        $this->data = $data;
        $this->method = $method;
        $this->secret_key = $this->method->options['secret_key'];
    }

    /**
     * @throws ApiErrorException
     */
    public function create(): Plan
    {
        $apiKey = $this->secret_key;
        Stripe::setApiKey($apiKey);
        $stripe = new StripeClient(['api_key' => $apiKey]);
        $product = $this->createProduct($stripe);
        return $this->createPlan($stripe, $product);
    }

    /**
     * @throws ApiErrorException
     */
    private function createProduct(StripeClient $stripe): object
    {
        return $stripe->products->create([
            'name' => $this->data['name'],
            'images' => ['https://i.imgur.com/EU9JA5R.png'],
        ]);
    }

    private function createPlan(StripeClient $stripe, object $product): Plan
    {
        return $stripe->plans->create([
            'amount' => $this->data['price'] * 100,
            'currency' => 'usd',
            'interval' => $this->data['billing_cycle'],
            'product' => $product->id,
            'nickname' => $this->data['name']
        ]);
    }
}
