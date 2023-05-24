<?php

namespace App\Services\Paypal;

use App\Models\PaymentMethod;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaypalPlan
{
    private string $base_url = "https://api-m.sandbox.paypal.com";
    private PaymentMethod $method;
    private array $data;
    private mixed $client_id;
    private mixed $client_secret;
    private ?string $access_token = null;
    private ?int $access_token_expires = null;

    public function __construct(array $data, PaymentMethod $method)
    {
        $this->data = $data;
        $this->method = $method;
        $this->client_id = $this->method->options['client_id'];
        $this->client_secret = $this->method->options['client_secret'];
    }

    public function create()
    {
        $product = $this->createPayPalProduct();
        return $this->createPayPalPlan($product);
    }

    public function getAccessToken()
    {
        if ($this->access_token && $this->access_token_expires > time()) {
            return $this->access_token;
        }
        $response = Http::withBasicAuth($this->client_id, $this->client_secret)
            ->asForm()->baseUrl($this->base_url)
            ->post('/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);
        $this->access_token = $response->json('access_token');
        $expire_in = $response->json('expires_in');
        $this->access_token_expires = time() + $expire_in;
        return $this->access_token;
        //return 'A21AAJIrm53pJqXS-IekiPmsTDgbOBXs9tfRSqIKhIn8uUICS6uxJE5sANtTqFeks3JFo8ARfaQntp0o_OqB0zNHZM-MbDnAA';

    }

    public function createPayPalProduct()
    {
        $url = '/v1/catalogs/products';
        $accessToken = $this->getAccessToken();

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$accessToken}",
                'PayPal-Request-Id' => Str::uuid()->toString(),
            ])->baseUrl($this->base_url)->post($url, [
                'name' => $this->data['name'],
                'description' => $this->data['description'],
                'type' => 'SERVICE',
                'category' => 'Software',
                'image_url' => 'https://i.imgur.com/EU9JA5R.png',
                'home_url' => route('front.home'),
            ]);

            $responseBody = $response->json();

            Log::info($response->body());

            return $responseBody;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $e->getMessage();
        }
    }


    public function createPayPalPlan($product)
    {
        $url = '/v1/billing/plans';
        $accessToken = $this->getAccessToken();
        $requestId = Str::uuid()->toString();

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
            'PayPal-Request-Id' => $requestId,
        ])->baseUrl($this->base_url)->post($url, [
            'product_id' => $product['id'],
            'name' => $this->data['name'],
            'description' => $this->data['description'],
            'billing_cycles' => [
                [
                    'frequency' => [
                        'interval_unit' => $this->mapIntervalUnit($this->data['billing_cycle']),
                        'interval_count' => 1
                    ],
                    'tenure_type' => 'REGULAR',
                    'sequence' => 1,
                    'total_cycles' => 1,
                    'pricing_scheme' => [
                        'fixed_price' => [
                            'value' => $this->data['price'],
                            'currency_code' => 'USD'
                        ]
                    ]
                ]
            ],
            'payment_preferences' => [
                'auto_bill_outstanding' => false,
                'setup_fee' => [
                    'value' => $this->data['price'],
                    'currency_code' => 'USD'
                ],
                'setup_fee_failure_action' => 'CONTINUE',
                'payment_failure_threshold' => 3
            ]
        ]);
        Log::info('plan created', $response->json());
        return $response->json();
    }

    private function mapIntervalUnit($unit): string
    {
        $intervalUnits = [
            'day' => 'DAY',
            'month' => 'MONTH',
            'week' => 'WEEK',
            'year' => 'YEAR'
        ];
        return $intervalUnits[$unit] ?? 'DAY';
    }

}
