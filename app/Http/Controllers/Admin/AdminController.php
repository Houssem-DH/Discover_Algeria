<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pgrequest;
use App\Models\Place;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $memberc=User::count();
        $categoryc=Category::count();
        $placec=Place::count();
        $tourc=Tour::count();
        $pgrequestc=Pgrequest::count();
        return view('admin/dashboard' , [
            'memberc' => $memberc,
            'categoryc' => $categoryc,
            'placec' => $placec,
            'tourc' => $tourc,
            'pgrequestc' => $pgrequestc,
        ]);
    }
}
