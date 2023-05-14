<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\PaymentGateways\PaymentGatewayFactory;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;


class CheckoutController extends Controller
{
    /**
     * @throws ApiErrorException
     * @throws \Exception
     */
    public function checkout(Request $request, $id)
    {
        $plan = Plan::select(['id', 'stripe_plan_id', 'paypal_plan_id'])->where('id', $id)->first();
        $payment_method = PaymentMethod::findOrFail(1);
        $gateway = PaymentGatewayFactory::create($payment_method->slug, $payment_method, $plan);
        return $gateway->create($plan, $payment_method);

    }

    public function success(Request $request, $gateway)
    {
        $payment_method = PaymentMethod::where('slug', $gateway)->first();
        $gateway = PaymentGatewayFactory::create($payment_method->slug, $payment_method);
        return $gateway->verify($request->get('session_id'));
    }
}
