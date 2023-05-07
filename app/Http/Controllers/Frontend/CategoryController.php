<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        
        $category=Category::get();


        
        return view('Frontend.Category.index', [
            'category' => $category,     
        ]);
    }


    public function view($id)
    {
        
        $place=Place::where('cate_id', $id)->paginate('18');
        $category=Category::where('id', $id)->first();


        
        return view('Frontend.Category.view', [
            'place' => $place,    
            'category' => $category,   
        ]);
    }
}
