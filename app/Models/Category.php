<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Place;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'name',
        'slug',
        'descreption',
        'image',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
    ];

    public function places()
    {
        return $this->hasMany(Place::class,'id','cate_id');
    }
}
