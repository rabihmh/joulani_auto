<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'status',
        'session_id',
        'payment_id',
        'payment_amount',
        'payment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id',);
    }

}
