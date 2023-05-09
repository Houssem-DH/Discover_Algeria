<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourrequest extends Model
{
    use HasFactory;
    protected $table='tourrequests';
    protected $fillable=[
        'fname',
        'lname',
        'address',
        'city',
        'states',
        'zip',
        'user_id',
        'tour_id',
        'cname',
        'cnumber',
        'mm',
        'yy',
        'cvv',
        'status',
        'rejected',


    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class,'tour_id','id');
    }
    public function tourrequest()
    {
        return $this->hasMany(Tourrequest::class,'id','tour_id');
    }
}
