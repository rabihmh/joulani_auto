<?php

namespace App\Services\Stripe;

use App\Models\PaymentMethod;
use App\Models\Subscription;
use App\Models\User;
use App\Traits\AttachRole;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class StripeSubscription
{
    use AttachRole;

    private PaymentMethod $method;
    private Subscription $subscription;

    public function __construct(PaymentMethod $method, Subscription $subscription)
    {
        $this->method = $method;
        $this->subscription = $subscription;
    }

    /**
     * @throws ApiErrorException
     */
    public function cancel(): void
    {
        $stripe = new StripeClient($this->method->options['secret_key']);
        $response = $stripe->subscriptions->cancel(
            $this->subscription->subscription_id,
            []
        );
        $this->UpdateSubscriptionModel($response['status']);
        $user = User::findOrFail($this->subscription->user_id);
        $this->attach($user, 'user');
    }

    protected function UpdateSubscriptionModel($status): void
    {
        $this->subscription->update([
            'status' => $status
        ]);
        $this->subscription->save();
    }
}
