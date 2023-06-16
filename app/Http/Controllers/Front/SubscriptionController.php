<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Subscription;
use App\Services\Paypal\PaypalSubscription;
use App\Services\Stripe\StripeSubscription;
use Stripe\Exception\ApiErrorException;

class SubscriptionController extends Controller
{
    /**
     * @throws ApiErrorException
     */
    public function cancel($id): \Illuminate\Http\RedirectResponse
    {
        $subscription = Subscription::findOrFail($id);
        $method = PaymentMethod::where('id', $subscription->payment_method)->first();
        if ($method->slug === 'stripe') {
            $stripeSubscription = new StripeSubscription($method, $subscription);
            $stripeSubscription->cancel();
        } elseif ($method->slug === 'paypal') {
            $paypalSubscription = new PaypalSubscription($method, $subscription);
            $paypalSubscription->cancel();
        }
        return redirect()->back()->with('success', 'تم إلغاء الاشتراك بنجاح');
    }
}
