<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Tour;
use App\Models\Wilaya;

class TourController extends Controller
{
    public function index()
    {
        
        $tour=Tour::orderBy('created_at', 'desc')->paginate('8');
        $place=Place::orderBy('name')->get();
   

        
        return view('admin.Tours.index', [
            'tour' => $tour,
            'place' => $place,
            
        ]);
    }


    public function insert(Request $request)

    {

        $place=Place::where('id',$request->input('place_id'))->first();
        $wil_id=Wilaya::where('id',$place->wil_id)->first();
        $tour=new Tour();
        

        $tour->place_id=$request->input('place_id');
        $tour->wil_id=$wil_id->id;
        $tour->date=$request->input('date');
        $tour->exp_date=$request->input('exp_date');
        $tour->n_place=$request->input('n_place');
        $tour->price=$request->input('price');
      
        $tour->save();

        return redirect()->route('tours')->with('status','Tour Added Successfully');

    }



    public function update(Request $request, $id)
    {

        $place=Place::where('id',$request->input('place_id'))->first();
        $wil_id=Wilaya::where('id',$place->wil_id)->first();
        $tour = Tour::find($id);
        
        $tour->place_id=$request->input('place_id');
        $tour->wil_id=$wil_id->id;
        $tour->date=$request->input('date');
        $tour->exp_date=$request->input('exp_date');
        $tour->n_place=$request->input('n_place');
        $tour->price=$request->input('price');
       


        $tour->update();
        return redirect()->route('tours')->with('status','Tour Updated Successfully');

    }

    public function destroy($id)
    {
        $tour = Tour::find($id);
        
        
        $tour->delete();
        return redirect()->route('tours')->with('status','Tour Deleted Successfully');
    }


}
