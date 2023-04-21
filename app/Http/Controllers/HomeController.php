<?php

namespace App\Http\Controllers;

use App\Models\Site_management;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = Site_management::first();
        $category = Category::get();
        return view('home', [
            'images' => $images,
            'category' => $category,
        ]);
    }
}