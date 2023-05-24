<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\PaymentGateways\PaymentGatewayFactory;
use Exception;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;


class CheckoutController extends Controller
{

    /**
     * return all payment method
     */
    public function choose(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $plan_id = $request->get('plan_id');
        $plan = Plan::where('id', $plan_id)->first();
        $payment_methods = PaymentMethod::all();
        return view('front.checkout.index', compact('payment_methods', 'plan'));
    }

    /**
     * @throws ApiErrorException
     * @throws Exception
     */

    public function checkout(Request $request)
    {
        $plan = Plan::where('id', $request->post('plan_id'))->first();
        $payment_method = PaymentMethod::where('slug', $request->post('method'))->first();
        $gateway = PaymentGatewayFactory::create($payment_method->slug, $payment_method, $plan);
        return $gateway->create($plan, $payment_method);

    }

    public function success(Request $request, $gateway)
    {
        $payment_method = PaymentMethod::where('slug', $gateway)->first();
        $gateway = PaymentGatewayFactory::create($payment_method->slug, $payment_method);
        $data = $payment_method->slug === 'stripe'
            ? ['session_id' => $request->get('session_id')]
            : $request->except('_token');
        return $gateway->verify($data);

    }
}
