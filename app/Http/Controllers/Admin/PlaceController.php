<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Category;
use App\Models\Wilaya;
use Illuminate\Support\Facades\File;

class PlaceController extends Controller
{
    public function index()
    {
        
        $place=Place::orderBy('created_at', 'desc')->paginate('8');
        $category=Category::get();
        $wilaya=Wilaya::get();

        
        return view('admin.Places.index', [
            'place' => $place,
            'category' => $category,
            'wilaya' => $wilaya,
        ]);
    }



    public function insert(Request $request)

    {

       

        $place=new Place();
        if($request->hasFile('image'))
        {

            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('storage/places',$filename);
            $place->image=$filename;
        }

        $place->name=$request->input('name');
        $place->slug=$request->input('slug');
        $place->cate_id=$request->input('cate_id');
        $place->wil_id=$request->input('wil_id');
        $place->descreption=$request->input('descreption');
        $place->pg_price=$request->input('pg_price');
        $place->meta_title=$request->input('meta_title');
        $place->meta_keywords=$request->input('meta_keywords');
        $place->meta_description=$request->input('meta_description');
        $place->save();

        return redirect()->route('places')->with('status','Place Added Successfully');

    }


    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        if($request->hasFile('image'))
        {
            $path='storage/places/'.$place->image;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('storage/places/',$filename);
            $place->image=$filename;
        }

        $place->name=$request->input('name');
        $place->slug=$request->input('slug');
        $place->cate_id=$request->input('cate_id');
        $place->wil_id=$request->input('wil_id');
        $place->descreption=$request->input('descreption');
        $place->pg_price=$request->input('pg_price');
        $place->meta_title=$request->input('meta_title');
        $place->meta_keywords=$request->input('meta_keywords');
        $place->meta_description=$request->input('meta_description');
       


        $place->update();
        return redirect()->route('places')->with('status','Place Updated Successfully');

    }

    public function destroy($id)
    {
        $place = Place::find($id);
        $path='storage/places/'.$place->image;
        if(File::exists($path))
        {
            File::delete($path);

        }
        
        $place->delete();
        return redirect()->route('places')->with('status','Place Deleted Successfully');
    }
}
