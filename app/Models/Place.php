<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Place extends Model
{
    protected $table='places';
    protected $fillable=[
        'cate_id',
        'wil_id',
        'name',
        'slug',
        'descreption',
        'image',
        'pg_price',
        'meta_title',
        'meta_keywords',
        'meta_description',


    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class,'wil_id','id');
    }

    public function review()
    {
        return $this->hasMany(Review::class,'id','place_id');
    }
}
