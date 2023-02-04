<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

//    protected function address(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($value, $attributes) => new Address(
//                $attributes['address_line_one'],
//                $attributes['address_line_two'],
//            ),
//            set: fn (Address $value) => [
//                'address_line_one' => $value->lineOne,
//                'address_line_two' => $value->lineTwo,
//            ],
//        );
//    }
    //Accessors
    public function getVehicleNameAttribute(): string
    {
        return Cache::remember("vehicle_name_" . $this->id, 120, function () {
            $made_name = Made::select('name')->where('id', $this->made_id)->first()->name;
            $mould_name = Mould::select('name')->where('id', $this->mould_id)->first()->name;
            return "{$made_name},{$mould_name}";
        });
    }

//    public function getAllImagesAttribute(): array
//    {
//        return preg_split('/\,/', $this->oimg);
//    }

    public function extras(): \Illuminate\Database\Eloquent\Relations\HasOne
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
