<?php

namespace App\PaymentGateways;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\Subscription;
use App\Traits\AttachRole;
use Carbon\Carbon;
use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Invoice;
use Stripe\Plan as StripePlan;
use Stripe\Stripe as StripeApi;
use Stripe\Subscription as StripeSubscription;
use Symfony\Component\HttpFoundation\Response;

class Stripe implements PaymentGateway
{
    use AttachRole;

    public ?Plan $plan;
    public ?PaymentMethod $method;

    public function __construct(?PaymentMethod $method, ?Plan $plan,)
    {
        $this->plan = $plan;
        $this->method = $method;
    }

    /**
     * @throws ApiErrorException
     */
    public function create(): bool|\Illuminate\Http\JsonResponse|string
    {
        $apiKey = $this->method->options['secret_key'];
        StripeApi::setApiKey($apiKey);
        header('Content-Type: application/json');
        try {
            // $interval = $this->plan->billing_cycle === 'month' ? now()->addDays(30) : now()->addYear();
            $plan = StripePlan::retrieve($this->plan->stripe_plan_id);
            $checkout_session = Session::create([
                'line_items' => [[
                    'price' => $plan->id,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => route('front.success', $this->method->slug, true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('front.cancel', $this->method->slug, true),
            ]);
            $this->createOrder($checkout_session);
            $this->createPayment($checkout_session);
            return response()->json(['message' => 'Order Created', 'link' => $checkout_session->url, Response::HTTP_OK]);
            // return redirect()->away($checkout_session->url);
        } catch (Error $e) {
            http_response_code(500);
            return json_encode(['error' => $e->getMessage()]);
        }
    }


    /**
     * @throws ApiErrorException
     */
    public function verify($data)
    {
        $session_id = $data['session_id'];
        StripeApi::setApiKey($this->method->options['secret_key']);

        try {
            $session = Session::retrieve($session_id);
            $invoice = $this->getStripeInvoice($session);
            if (!$session) {
                throw new \InvalidArgumentException("Invalid session ID: $session_id");
            }

            $order = Order::query()
                ->where('session_id', $session_id)
                ->where('status', 'pending')
                ->first();
            if (!$order) {
                throw new \InvalidArgumentException("Order not found for session ID: $session_id");
            }
            DB::beginTransaction();

            $payment = Payment::query()->where('session_id', $session_id)->first();
            $user = $order->user;

            $this->updateOrderAndPayment($order, $payment, $session->payment_status, $invoice);
            $this->createSubscription($invoice);
            $this->attach($user, 'subscriber');
            DB::commit();
            return redirect()->route('front.home')->with('success', 'تم تفعيل الاشتراك بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            http_response_code(500);
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    public function formOptions(): array
    {
        return [
            'publishable_key' => [
                'type' => 'text',
                'label' => 'Publishable Key',
                'placeholder' => 'Publishable Key',
                'required' => true,
                'validation' => 'required|string|max:255'
            ],
            'secret_key' => [
                'type' => 'text',
                'label' => 'Secret Key',
                'placeholder' => 'Secret Key',
                'required' => true,
                'validation' => 'required|string|max:255'
            ],
            'webhook_secret_key' => [
                'type' => 'text',
                'label' => 'Webhook Secret Key',
                'placeholder' => 'Webhook Secret Key',
                'required' => true,
                'validation' => 'required|string|max:255'
            ]
        ];
    }

    /**
     * @throws ApiErrorException
     */
    private function createOrder(Session $checkout_session): Order
    {
        return Order::create([
            'user_id' => Auth::id(),
            'plan_id' => $this->plan->id,
            'status' => 'pending',
            'session_id' => $checkout_session->id,
            'payment_amount' => (int)($checkout_session->amount_total) / 100,
        ]);
    }

    private function createPayment(Session $checkout_session): Payment
    {
        return Payment::create([
            'payment_method_id' => $this->method->id,
            'user_id' => Auth::id(),
            'plan_id' => $this->plan->id,
            'amount' => (int)($checkout_session->amount_total) / 100,
            'currency_code' => $checkout_session->currency,
            'status' => 'pending',
            'session_id' => $checkout_session->id,
        ]);
    }

    /**
     * @throws ApiErrorException
     */
    private function getStripeInvoice(Session $session): Invoice
    {
        $invoice_id = $session->invoice;
        return Invoice::retrieve($invoice_id);

    }

    private function updateOrderAndPayment($order, $payment, $paymentStatus, $invoice)
    {
        $order->status = $paymentStatus;
        $order->payment_id = $invoice->charge;
        $order->payment_date = now();
        $order->save();

        $payment->status = $paymentStatus;
        $payment->transaction_id = $invoice->charge;
        $payment->payment_response = $invoice;
        $payment->save();
    }

    /**
     * @throws ApiErrorException
     */
    private function createSubscription(Invoice $invoice)
    {
        $plan = Plan::query()->select('id')->where('stripe_plan_id', $invoice->lines->data[0]['plan']->id)->first();
        $subscription = StripeSubscription::retrieve($invoice->subscription);
        $startDate = Carbon::createFromTimestamp($subscription->current_period_start)->toDateTimeString();
        $endDate = Carbon::createFromTimestamp($subscription->current_period_end)->toDateTimeString();

        Subscription::create([
            'user_id' => Auth::id(),
            'plan_id' => $plan->id,
            'payment_method' => $this->method->id,
            'status' => $subscription->status,
            'invoice_id' => $invoice->id,
            'subscription_id' => $subscription->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
    }

}
