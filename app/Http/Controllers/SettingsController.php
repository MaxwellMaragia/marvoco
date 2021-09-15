<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $logo = Setting::where('name', 'logo')->first();
        $favicon = Setting::where('name', 'favicon')->first();
        $facebook = Setting::where('name', 'facebook')->first();
        $linkedin = Setting::where('name', 'linkedin')->first();


        return view('admin.settings.settings',compact('logo','favicon','facebook','linkedin'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        if($request->hasFile('logo'))
        {
            $logo = Setting::where('name','logo')->first();

            $current_image = 'storage/files/settings/'.substr($logo->value,22);

            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $logo->value = $request->logo->store('public/files/settings');
            $logo->save();
        }

        if($request->hasFile('favicon'))
        {
            $favicon = Setting::where('name','favicon')->first();
            $favicon->value = $request->favicon->store('public/files/settings');

        }

        $facebook = Setting::where('name','facebook')->first();
        $facebook->value = $request->facebook;
        $facebook->save();

        $linkedin = Setting::where('name','linkedin')->first();
        $linkedin->value = $request->linkedin;
        $linkedin->save();

        return redirect()->back()->with('success','Settings updated successfully');
    }
}
