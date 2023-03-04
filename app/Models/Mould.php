<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mould extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'moulds';
    protected $fillable = [
        'made_id','parent_id', 'name', 'slug'
    ];

    public function made()
    {
        return $this->belongsTo(Made::class);
    }
    public function children(){
        return $this->hasMany(Mould::class,'parent_id','id');
    }
}
