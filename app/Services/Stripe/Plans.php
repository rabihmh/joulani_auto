<?php

namespace App\Services\Stripe;

use Stripe\Exception\ApiErrorException;
use Stripe\Plan;
use Stripe\Stripe;
use Stripe\StripeClient;

class Plans
{
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @throws ApiErrorException
     */
    public function create(): Plan
    {
        $apiKey = config('services.stripe.secret_key');
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
            'interval' => 'month',
            'product' => $product->id,
            'nickname' => $this->data['name']
        ]);
    }
}
