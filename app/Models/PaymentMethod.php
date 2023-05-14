<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $casts = [
        'options' => 'array'
    ];
    protected $fillable = [
        'name', 'description', 'image', 'status', 'options'
    ];
}
