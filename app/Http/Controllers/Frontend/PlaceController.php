<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pgrequest;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function view($slug)
    {
        
        $place=Place::where('slug', $slug)->first();
        $pgrequestc=Pgrequest::where('user_id', Auth::user()->id)->where('place_id', $place->id)->where('status', '0')->count();
        $review=Review::where('place_id', $place->id)->orderBy('created_at', 'DESC')->paginate('8');
        $countr=Review::where('place_id', $place->id)->count();



        
        return view('Frontend.Places.view', [
            'place' => $place,  
            'review' => $review, 
            'countr' => $countr,     
            'pgrequestc' => $pgrequestc,     
        ]);
    }
}
