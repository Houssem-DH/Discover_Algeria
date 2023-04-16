<?php

namespace App\Http\Controllers;

use App\Models\Site_management;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = Site_management::first();
        return view('home', [
            'images' => $images,
        ]);
    }
}