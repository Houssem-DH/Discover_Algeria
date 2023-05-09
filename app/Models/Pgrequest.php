<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgrequest extends Model
{
    use HasFactory;
    protected $table='pgrequests';
    protected $fillable=[
        'fname',
        'lname',
        'address',
        'city',
        'states',
        'zip',
        'user_id',
        'place_id',
        'cname',
        'cnumber',
        'mm',
        'yy',
        'cvv',
        'status',
        'rejected',


    ];

    public function place()
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }
    
}
