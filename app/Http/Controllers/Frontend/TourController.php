<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{


    public function index()
    {
        
        $tour=Tour::get();


        
        return view('Frontend.Tours.index', [
            'tour' => $tour,     
        ]);
    }
    public function view($id)
    {
        
        $tour=Tour::where('id', $id)->first();
        



        
        return view('Frontend.Tours.view', [
            'tour' => $tour,  
            
        ]);
    }
}
