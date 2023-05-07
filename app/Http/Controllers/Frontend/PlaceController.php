<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Review;

class PlaceController extends Controller
{
    public function view($slug)
    {
        
        $place=Place::where('slug', $slug)->first();
        $review=Review::where('place_id', $place->id)->orderBy('created_at', 'DESC')->paginate('8');
        $countr=Review::where('place_id', $place->id)->count();



        
        return view('Frontend.Places.view', [
            'place' => $place,  
            'review' => $review, 
            'countr' => $countr,     
        ]);
    }
}
