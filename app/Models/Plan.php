<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'vehicle_limit', 'billing_cycle', 'stripe_plan_id', 'paypal_plan_id'
    ];
}
