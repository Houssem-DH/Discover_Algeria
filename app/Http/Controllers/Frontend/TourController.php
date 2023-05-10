<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Review;
use App\Models\Tour;
use App\Models\Tourrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{


    public function index()
    {
        
        $tour=Tour::orderBy('created_at', 'desc')->paginate('8');
        


        
        return view('Frontend.Tours.index', [
            'tour' => $tour,     
        ]);
    }
    public function view($id)
    {
        if(Auth::check()){
        $tour=Tour::where('id', $id)->first();
        $tourrequestc=Tourrequest::where('user_id', Auth::user()->id)->where('tour_id', $tour->id)->where('status', '0')->count();
        



        
        return view('Frontend.Tours.view', [
            'tour' => $tour,  
            'tourrequestc' => $tourrequestc,  
            
        ]);
        }
        else {

            $tour=Tour::where('id', $id)->first();
            
            
    
    
    
            
            return view('Frontend.Tours.view', [
                'tour' => $tour,  
                
                
            ]);

        }
    }
}
