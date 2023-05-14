<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method_id',
        'user_id',
        'plan_id',
        'amount',
        'currency_code',
        'status',
        'session_id',
        'transaction_id',
        'payment_response',
    ];
    protected $casts = [
        'payment_response' => 'json'
    ];
}
