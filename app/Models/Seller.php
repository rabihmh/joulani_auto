<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'region_id',
        'seller_name',
        'seller_mobile',
        'seller_address',
        'image'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'seller_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
