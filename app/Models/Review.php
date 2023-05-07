<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table='reviews';
    protected $fillable=[
        'user_id',
        'place_id',
        'comment',
        


    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function place()
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }
}
