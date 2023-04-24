<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        
        $category=Category::orderBy('created_at', 'desc')->paginate('8');
       
        return view('admin.Categories.index', [
            'category' => $category,
        ]);
    }



    public function insert(Request $request)

    {

        $request->validate([

            'name' => ['required'],
            'slug' => ['required', 'unique:categories'],
            'descreption' => ['required'],
            'image' => ['required']

        ]);


        $category=new Category();
        if($request->hasFile('image'))
        {

            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('storage/categories',$filename);
            $category->image=$filename;
        }

        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->descreption=$request->input('descreption');
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_description=$request->input('meta_description');
        $category->save();

        return redirect()->route('categories')->with('status','Category Added Successfully');

    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path='storage/categories/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('storage/categories',$filename);
            $category->image=$filename;
        }

        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->descreption=$request->input('descreption');
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_description=$request->input('meta_description');


        $category->update();
        return redirect()->route('categories')->with('status','Category Updated Successfully');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $path='storage/categories/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);

        }

        $category->delete();
        return redirect()->route('categories')->with('status','Category Deleted Successfully');
    }


}
