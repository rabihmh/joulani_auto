<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'region_id',
        'seller_name',
        'seller_mobile',
        'seller_address',
        'location',
        'image'
    ];
    protected $hidden = [
        'location',
    ];
    protected $appends = [
        'location_data'
    ];

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vehicle::class, 'seller_id', 'id');
    }

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function getLocationDataAttribute(): array
    {
        $lng = DB::selectOne('SELECT ST_X(location) as lng FROM sellers WHERE id = ?', [$this->id])->lng;
        $lat = DB::selectOne('SELECT ST_Y(location) as lat FROM sellers WHERE id = ?', [$this->id])->lat;
        return [
            'lng' => $lng,
            'lat' => $lat,
        ];
    }

}
