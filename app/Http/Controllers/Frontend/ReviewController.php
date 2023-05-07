<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function insert(Request $request, $user_id ,$place_id)

    {

        $request->validate([

            'comment' => ['required'],
           

        ]);


        $review=new Review();
        
        $review->comment=$request->input('comment');
        $review->user_id=$user_id;
        $review->place_id=$place_id;
        $review->save();

        return redirect()->back();

    }
}
