<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Plan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function get(): Collection
    {
        if (!$this->items->count()) {
            $this->items = Cart::with('plan')->get();
        }
        return $this->items;
    }

    public function add(Plan $plan, $quantity)
    {
        // TODO: Implement add() method.
        $item = Cart::where('product_id', $plan->id)->first();

        if (!$item) {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'plan_id' => $plan->id,
                'quantity' => $quantity
            ]);
            $this->get()->push($cart);
            return $cart;
        }
        return $item->increment('quantity', $quantity);

    }

    public function update($id, $quantity)
    {
        Cart::where('id', '=', $id)->update([
            'quantity' => $quantity
        ]);
    }

    public function delete($id)
    {
        Cart::where('id', '=', $id)
            ->delete();
    }

    public
    function empty()
    {
        Cart::query()->delete();
    }

    public function total(): float
    {
        return (float)$this->get()->sum(function ($item) {
            return $item->plan->price * $item->quantity;
        });
    }


}
