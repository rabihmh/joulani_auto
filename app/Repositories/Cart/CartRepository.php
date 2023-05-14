<?php

namespace App\Repositories\Cart;

use App\Models\Plan;
use Illuminate\Support\Collection;

interface CartRepository
{
    public function get(): Collection;


    public function add(Plan $plan, $quantity);

    public function update($id, $quantity);

    public function delete($item);

    public function empty();

    public function total(): float;
}
