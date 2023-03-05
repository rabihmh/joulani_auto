<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $appends = ['vehicle_name'];
    protected $casts = [
        'is_special' => 'boolean',
//        'year_of_product' => 'date',
    ];

    //Accessors
    public function getVehicleNameAttribute(): string
    {
        return Cache::remember("vehicle_name_" . $this->id, 120, function () {
            $madeName = optional($this->made)->name;
            $mouldName = optional($this->mould)->name;
            return "{$madeName},{$mouldName}";
        });
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', 'active');
        });
    }
//    public function getAllImagesAttribute(): array
//    {
//        return preg_split('/\,/', $this->oimg);
//    }
    public function scopeSpecial(Builder $builder)
    {
        $builder->where('is_special', true);
    }

    public function extra(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Extra::class, 'vehicle_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function made()
    {
        return $this->belongsTo(Made::class);
    }

    public function mould()
    {
        return $this->belongsTo(Mould::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
