<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;
    protected $table='wilayas';
    protected $fillable=[
        'number',
        'name'
        

    ];

    public function places()
    {
        return $this->hasMany(Place::class,'id','wil_id');
    }
}
