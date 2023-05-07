<?php

namespace App\Http\Controllers;

use App\Models\Site_management;
use App\Models\Category;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $images = Site_management::first();
        $category = Category::get();
        $wilaya = Wilaya::get();
        $review=Review::orderBy('created_at', 'DESC')->paginate('5');

        return view('home', [
            'images' => $images,
            'category' => $category,
            'wilaya' => $wilaya,
            'review' => $review,

        ]);
    }


    public function search(Request $request)
    {
        $search_text=$_GET['query'];
        $wil_id=$_GET['wil_id'];
        $cate_id=$_GET['cate_id'];
        $place=Place::where('meta_keywords','LIKE','%'.$search_text.'%')->where('cate_id','=',$cate_id)->where('wil_id','=',$wil_id)->get();
        


       
        return view('Search.index' , [
            'place' => $place,
           

        ]);


    }
}