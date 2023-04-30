<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function view($slug)
    {
        
        $place=Place::where('slug', $slug)->first();


        
        return view('Frontend.Places.view', [
            'place' => $place,     
        ]);
    }
}
