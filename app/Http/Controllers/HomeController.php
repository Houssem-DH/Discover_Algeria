<?php

namespace App\Http\Controllers;

use App\Models\Site_management;
use App\Models\Category;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = Site_management::first();
        $category = Category::get();
        $wilaya = Wilaya::get();
        return view('home', [
            'images' => $images,
            'category' => $category,
            'wilaya' => $wilaya,

        ]);
    }


    public function search()
    {
        $search_text=$_GET['query'];
        $articles=Article::where('meta_keywords','LIKE','%'.$search_text.'%')->get();
        $categories=Category::where('meta_keywords','LIKE','%'.$search_text.'%')->get();
        return view('frontend.search' ,compact(['articles','categories']));


    }
}