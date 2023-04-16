<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site_management extends Model
{
    use HasFactory;
    protected $table='site_managements';
    protected $fillable=[
        'logo',
        'hero_video',
        'hero_banner'

    ];
}
