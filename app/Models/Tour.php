<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table='tours';
    protected $fillable=[
        'place_id',
        'wil_id',
        'expired',
        'date',
        'exp_date',
        'n-place',
        'n-client',
        'price',
       


    ];

    public function place()
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class,'wil_id','id');
    }
}
