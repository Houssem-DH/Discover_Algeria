<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class WilayaController extends Controller
{
    public function index()
    {
        $wilayas = Wilaya::paginate('8');
        return view('admin.Wilayas.index', [
            'wilayas' => $wilayas,
        ]);
    }


    public function insert(Request $request)
    {

        $request->validate([
            'number' => ['required'],
            'name' => ['required'],

        ]);

        $wilaya=new Wilaya();
       

        $wilaya->number=$request->input('number');
        $wilaya->name=$request->input('name');
        $wilaya->save();
        return redirect()->route('wilayas')->with('status','Wilaya Created Successfully');
    }



    public function update(Request $request, $id)
    {
        $wilaya = Wilaya::find($id);


        $wilaya->number = $request->input('number');
        $wilaya->name = $request->input('name');


        $wilaya->update();
        return redirect()->route('wilayas')->with('status','Wilaya Updated Successfully');

    }

    public function destroy($id)
    {
        $wilaya = Wilaya::find($id);


        $wilaya->delete();
        return redirect()->route('wilayas')->with('status','Wilaya Deleted Successfully');
    }


   

}
