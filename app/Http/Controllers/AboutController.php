<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $about_header = Setting::where('name', 'about_header')->first();
        $about_text = Setting::where('name', 'about_text')->first();
        $mission = Setting::where('name', 'mission')->first();
        $mission_image = Setting::where('name', 'mission_image')->first();


        return view('admin.settings.about',compact('about_header','about_text','mission','mission_image'));

    }

    public function store(Request $request)
    {

        $about_header = Setting::where('name','about_header')->first();
        $about_header->value = $request->about_header;
        $about_header->save();

        $about_text = Setting::where('name','about_text')->first();
        $about_text->value = $request->about_text;
        $about_text->save();

        $mission = Setting::where('name','mission')->first();
        $mission->value = $request->mission;
        $mission->save();

        if($request->hasFile('mission_image'))
        {
            $mission_image = Setting::where('name','mission_image')->first();
            $mission_image->value = $request->mission_image->store('public/files/settings');
            $mission_image->save();
        }


        return redirect()->back()->with('success','About us page updated successfully');
    }
}
