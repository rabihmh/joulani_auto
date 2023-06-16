<?php


namespace App\PaymentGateways;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\Subscription;
use App\Traits\AttachRole;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Paypal implements PaymentGateway
{
    use AttachRole;

    public ?Plan $plan;
    public ?PaymentMethod $method;
    private string $base_url = "https://api-m.sandbox.paypal.com";
    private ?string $access_token = null;
    private ?int $access_token_expires = null;

    public function __construct(?PaymentMethod $method, ?Plan $plan)
    {
        $this->plan = $plan;
        $this->method = $method;
    }

    public function getAccessToken()
    {
        if ($this->access_token && $this->access_token_expires > time()) {
            return $this->access_token;
        }
        $response = Http::withBasicAuth($this->method->options['client_id'], $this->method->options['client_secret'])
            ->asForm()->baseUrl($this->base_url)
            ->post('/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);
        $this->access_token = $response->json('access_token');
        $expire_in = $response->json('expires_in');
        $this->access_token_expires = time() + $expire_in;
        return $this->access_token;

    }

    public function create(): JsonResponse
    {
        $clientId = $this->method->options['client_id'];
        $planId = $this->plan->paypal_plan_id;
        $order = $this->createOrder();
        $payment = $this->createPayment();
        return response()->json(['clientID' => $clientId, 'planID' => $planId, 'orderID' => $order->id, 'paymentID' => $payment->id]);
    }

    public
    function verify($data): bool|string|RedirectResponse
    {

        $order_id = $data['orderID'];
        $payment_id = $data['paymentID'];
        $paypal_subscriptionID = $data['subscription_id'];
        $paypal_orderID = $data['orderPaypalId'];
        try {
            $order = Order::where('id', $order_id)->where('status', 'pending')->first();
            $subscription_details = $this->subscription($paypal_subscriptionID);
            $transaction_id = $this->getLastTransactionOfSubscription($paypal_subscriptionID);
            if (!$order)
                throw new NotFoundHttpException();
            DB::beginTransaction();
            $payment = Payment::query()->where('id', $payment_id)->first();
            $user = $order->user;
            $this->updateOrderAndPaymentModel($order, $subscription_details, $payment, $transaction_id);
            $this->createSubscription($subscription_details);
            $this->attach($user, 'subscriber');
            DB::commit();
            return redirect()->route('front.home')->with('success', 'تم تفعيل الاشتراك بنجاح');
        } catch (\Exception $exception) {
            DB::rollBack();
            http_response_code(500);
            return json_encode(['error' => $exception->getMessage()]);
        }
    }

    public
    function formOptions(): array
    {
        return [
            'client_id' => [
                'type' => 'text',
                'label' => 'Client Id',
                'placeholder' => 'Client Id',
                'required' => true,
                'validation' => 'required|string|max:255'
            ],
            'client_secret' => [
                'type' => 'text',
                'label' => 'Client Secret',
                'placeholder' => 'Client Secret',
                'required' => true,
                'validation' => 'required|string|max:255'
            ],
        ];
    }

    private function createOrder(): Order
    {
        return Order::create([
            'user_id' => Auth::id(),
            'plan_id' => $this->plan->id,
            'status' => 'pending',
            'payment_amount' => (int)$this->plan->price,
        ]);
    }

    private function createPayment(): Payment
    {
        return Payment::create([
            'payment_method_id' => $this->method->id,
            'user_id' => Auth::id(),
            'plan_id' => $this->plan->id,
            'amount' => (int)$this->plan->price,
            'currency_code' => 'USD',
            'status' => 'pending',
        ]);
    }

    private function subscription($id): array
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}",
        ])->baseUrl($this->base_url)->get('/v1/billing/subscriptions/' . $id . '?fields=*');

        $data = $response->json();
        $plan = Plan::where('paypal_plan_id', $data['plan_id'])->first();

        $subscriptionID = $data['id'];
        $lastPaymentAmount = $data['billing_info']['last_payment']['amount'];
        $start_time = $data['start_time'];

        $end_time = match ($plan->billing_cycle) {
            'day' => date('Y-m-d\TH:i:s\Z', strtotime($start_time . ' +1 day')),
            'week' => date('Y-m-d\TH:i:s\Z', strtotime($start_time . ' +1 week')),
            'month' => date('Y-m-d\TH:i:s\Z', strtotime($start_time . ' +1 month')),
            'year' => date('Y-m-d\TH:i:s\Z', strtotime($start_time . ' +1 year')),
            default => null,
        };

        return [
            'subscription_id' => $subscriptionID,
            'amount' => $lastPaymentAmount,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'plan_model_id' => $plan->id
        ];
    }

    private function getLastTransactionOfSubscription($subscriptionID)
    {
        $startTime = date('Y-m-d\TH:i:s\Z', strtotime('-1 day'));
        $endTime = date('Y-m-d\TH:i:s\Z');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}",
        ])->get('https://api-m.sandbox.paypal.com/v1/billing/subscriptions/' . $subscriptionID . '/transactions', [
            'start_time' => $startTime,
            'end_time' => $endTime,
            'page_size' => 1,
            'sort_order' => 'desc',
        ]);
        $responseData = $response->json();
        $transactions = $responseData['transactions'] ?? [];

        if (!empty($transactions)) {
            $lastTransaction = $transactions[0];
            $lastTransactionId = $lastTransaction['id'];
        } else {
            $lastTransactionId = null;
        }

        return $lastTransactionId;
    }

    private function updateOrderAndPaymentModel($order, $subscription_details, $payment, $transaction_id)
    {
        $order->status = 'paid';
        $order->payment_id = $transaction_id;
        $order->payment_amount = $subscription_details['amount']['value'];
        $order->payment_date = now();
        $order->save();

        $payment->status = 'paid';
        $payment->transaction_id = $transaction_id;
        $payment->save();
    }

    private function createSubscription($data)
    {
        $startDateTime = Carbon::parse($data['start_time'])->format('Y-m-d H:i:s');
        $endDateTime = Carbon::parse($data['end_time'])->format('Y-m-d H:i:s');

        Subscription::create([
            'user_id' => Auth::id(),
            'plan_id' => $data['plan_model_id'],
            'payment_method' => $this->method->id,
            'status' => 'active',
            'subscription_id' => $data['subscription_id'],
            'start_date' => $startDateTime,
            'end_date' => $endDateTime,
        ]);
    }


}

