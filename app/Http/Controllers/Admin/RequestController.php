<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pgrequest;
use App\Models\Tourrequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{


    public function pgindex()
    {
        
        $pgrequest=Pgrequest::orderBy('created_at', 'desc')->paginate('8');
       

        return view('admin.Pgrequest.index', [
            'pgrequest' => $pgrequest,
          
        ]);
    }
    public function pgaccept($id)
    {
        
        $pgrequest=Pgrequest::find($id);
        $pgrequest->status='1';
        $pgrequest->update();

        return redirect()->route('pgindex')->with('status','Accepted Successfully');
    }

    public function pgreject($id)
    {
        
        $pgrequest=Pgrequest::find($id);
        $pgrequest->rejected='1';
        $pgrequest->update();

        return redirect()->route('pgindex')->with('status','Rejected Successfully');
    }











    public function tourindex()
    {
        
        $tourrequest=Tourrequest::orderBy('created_at', 'desc')->paginate('8');
       

        return view('admin.Tourrequest.index', [
            'tourrequest' => $tourrequest,
          
        ]);
    }
    public function touraccept($id)
    {
        
        $tourrequest=Tourrequest::find($id);
        $tourrequest->status='1';
        $tourrequest->update();

        return redirect()->route('tourindex')->with('status','Accepted Successfully');
    }

    public function tourreject($id)
    {
        
        $tourrequest=Tourrequest::find($id);
        $tourrequest->rejected='1';
        $tourrequest->update();

        return redirect()->route('tourindex')->with('status','Rejected Successfully');
    }
}
