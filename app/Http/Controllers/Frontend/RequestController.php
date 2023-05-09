<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pgrequest;
use App\Models\Tourrequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function index($id)
    {
        
        $pgrequest=Pgrequest::where('user_id', $id)->orderBy('created_at', 'desc')->paginate('8');
        $tourrequest=Tourrequest::where('user_id',$id)->orderBy('created_at', 'desc')->paginate('8');
        


        
        return view('Frontend.Requests.index', [
            'pgrequest' => $pgrequest,  
            'tourrequest' => $tourrequest, 
           
        ]);
    }


    public function pgrequest(Request $request, $user_id,$place_id)
    {
        
        

        $pgrequest=new Pgrequest();

        $request->validate([
            'fname'=>['required', 'string', 'max:255'],
            'lname'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255'],
            'states'=>['required', 'string', 'max:255'],
            'zip'=>['required', 'string', 'max:5'],
            'cname'=>['required', 'string','min:2' ,'max:255'],
            'cnumber'=>['required', 'string', 'max:16', 'min:16'],
            'mm'=>['required', 'string', 'max:2', 'min:2'],
            'yy'=>['required', 'string', 'max:2', 'min:2'],
            'cvv'=>['required', 'string', 'max:3', 'min:3']
        
        
        
        
        ]);

        $pgrequest->user_id=$user_id;
        $pgrequest->place_id=$place_id;
        $pgrequest->fname=$request->input('fname');
        $pgrequest->lname=$request->input('lname');
        $pgrequest->address=$request->input('address');
        $pgrequest->city=$request->input('city');
        $pgrequest->states=$request->input('states');
        $pgrequest->zip=$request->input('zip');
        $pgrequest->cname=$request->input('cname');
        $pgrequest->cnumber=$request->input('cnumber');
        $pgrequest->mm=$request->input('mm');
        $pgrequest->yy=$request->input('yy');
        $pgrequest->cvv=$request->input('cvv');
        

        $pgrequest->save();

        return redirect()->back()->with('status','Request Added Seccesfuly');
        
      
    }

    public function tourrequest(Request $request, $user_id,$tour_id)
    {
        
        

        $tourrequest=new Tourrequest();

        $request->validate([
            'fname'=>['required', 'string', 'max:255'],
            'lname'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255'],
            'states'=>['required', 'string', 'max:255'],
            'zip'=>['required', 'string', 'max:5'],
            'cname'=>['required', 'string','min:2' ,'max:255'],
            'cnumber'=>['required', 'string', 'max:16', 'min:16'],
            'mm'=>['required', 'string', 'max:2', 'min:2'],
            'yy'=>['required', 'string', 'max:2', 'min:2'],
            'cvv'=>['required', 'string', 'max:3', 'min:3']
        
        
        
        
        ]);

        $tourrequest->user_id=$user_id;
        $tourrequest->tour_id=$tour_id;
        $tourrequest->fname=$request->input('fname');
        $tourrequest->lname=$request->input('lname');
        $tourrequest->address=$request->input('address');
        $tourrequest->city=$request->input('city');
        $tourrequest->states=$request->input('states');
        $tourrequest->zip=$request->input('zip');
        $tourrequest->cname=$request->input('cname');
        $tourrequest->cnumber=$request->input('cnumber');
        $tourrequest->mm=$request->input('mm');
        $tourrequest->yy=$request->input('yy');
        $tourrequest->cvv=$request->input('cvv');
        

        $tourrequest->save();

        return redirect()->back()->with('status','Request Added Seccesfuly');
        
      
    }
}
