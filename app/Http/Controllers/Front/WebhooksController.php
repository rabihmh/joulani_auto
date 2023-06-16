<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Services\Paypal\PaypalWebhook;
use App\Services\Stripe\StripeWebhook;
use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    private StripeWebhook $stripeWebhook;
    private PaypalWebhook $paypalWebhook;

    public function __construct(StripeWebhook $stripeWebhook, PaypalWebhook $paypalWebhook)
    {
        $this->stripeWebhook = $stripeWebhook;
        $this->paypalWebhook = $paypalWebhook;
    }

    public function __invoke(Request $request, $gateway)
    {
        $method = PaymentMethod::where('slug', $gateway)->first();
        if ($gateway === 'stripe') {
            $this->stripeWebhook->handle($method, $request);
        } elseif ($gateway === 'paypal') {
            $this->paypalWebhook->handle($method, $request);
        }
    }
}
