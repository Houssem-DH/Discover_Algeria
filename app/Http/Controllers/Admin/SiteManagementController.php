<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site_management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteManagementController extends Controller
{
    public function index()
    {

//
        $images = Site_management::first();
        return view('admin.SiteManagement.index', [
            'images' => $images,
        ]);

    }


    public function update_logo(Request $request)
    {

        $logo = Site_management::first();


        if ($request->hasFile('image')) {
            $path = 'storage/sitemanagement/logo/' . $logo->logo;
            if (File::exists($path)) {
                File::delete($path);

            }


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/sitemanagement/logo/', $filename);
            $logo->logo = $filename;
        }

        $logo->update();



        return redirect()->route('site-management')->with('status', 'Logo Updated Successfully');
    }


    public function update_hero_banner(Request $request)
    {

        $hero_banner = Site_management::first();


        if ($request->hasFile('image')) {
            $path = 'storage/sitemanagement/hero_banner/' . $hero_banner->hero_banner;
            if (File::exists($path)) {
                File::delete($path);

            }


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/sitemanagement/hero_banner/', $filename);
            $hero_banner->hero_banner = $filename;
        }

        $hero_banner->update();



        return redirect()->route('site-management')->with('status', 'Hero Banner Updated Successfully');
    }

    public function update_hero_video(Request $request)
    {

        $hero_video = Site_management::first();

        $hero_video->hero_video = $request->input('hero_video');

        $hero_video->update();



        return redirect()->route('site-management')->with('status', 'Hero Video Updated Successfully');
    }
}