<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Place extends Model
{
    protected $table='articles';
    protected $fillable=[
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'image',
        'new',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',


    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
