<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Made extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mades';
    protected $fillable = [
        'name', 'slug'
    ];

    public function moulds()
    {
        return $this->hasMany(Mould::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'made_id');
    }

}
