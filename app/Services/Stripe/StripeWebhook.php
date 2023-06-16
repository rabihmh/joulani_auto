<?php

namespace App\Services\Stripe;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Event;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeWebhook
{


    /**
     * @throws Exception
     */
    public function handle(PaymentMethod $method, Request $request)
    {
        $endpoint_secret = $method->options['webhook_secret_key'];
        $payload = $request->getContent();
        $headerSignature = $request->header('Stripe-Signature');
        $event = null;
        try {
            $event = Event::constructFrom(
                json_decode($payload, true),
                $headerSignature,
                $endpoint_secret
            );
            switch ($event->type) {
                case 'checkout.session.completed':
                    Log::alert('start session completed');
                    $this->checkoutSessionComplete($event->data);
                    Log::alert('end session completed');
                    break;
                case 'subscription_schedule.expiring':
                    Log::alert('Handle expiring subscription,the subscription will end after 7 day');
                    break;
                case 'subscription_schedule.canceled':
                    Log::alert('Handle canceled subscription');
                    break;
                case 'subscription_schedule.completed':
                    Log::alert('Handle completed subscription');
                    break;

                default:
                    // Unknown event type
                    Log::alert('Unknown event type');
                    break;
            }
        } catch (Exception $e) {
            Log::error('Stripe Webhook Error:', (array)$e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private function checkoutSessionComplete(object $data): void
    {
        $session_id = $data->object->id;
        try {
            $order = Order::where('session_id', $session_id)->first();
            if (!$order) {
                Log::alert('not found');
                throw new NotFoundHttpException();
            }
            DB::beginTransaction();
            $payment = Payment::query()->where('session_id', $session_id)->first();
            $order->stauts = $data->object->payment_status;
            $order->save();
            $payment->staus = $data->object->payment_status;
            $payment->save();
//            create user subscription:TODO
//           attach to user the role subscriber:TODO
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Stripe Webhook Error:', (array)$e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
