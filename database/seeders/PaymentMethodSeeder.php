<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::query()->create(
            [
                'name' => 'Stripe',
                'slug' => Str::slug('Stripe'),
                'description' => 'Stripe ....',
                'status' => 'active',
                'icon' => 'uploads/payments/processout.svg',
                'options' => [
                    'publishable_key' => config('services.stripe.publishable_key'),
                    'secret_key' => config('services.stripe.secret_key')
                ]
            ],

        );
        PaymentMethod::query()->create(
            [
                'name' => 'Paypal',
                'slug' => Str::slug('Paypal'),
                'description' => 'Paypal ....',
                'status' => 'active',
                'icon' => 'uploads/payments/braintree_paypal.svg',
                'options' => [
                    'client_id' => '',
                    'client_secret' => ''
                ]
            ]

        );
    }
}

