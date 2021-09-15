<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Banner;

class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.show',compact('banners'));
    }


    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'subtitle'=>'required',
            'button_text'=>'required',
            'url'=>'required',
            'image'=>'required'

        ]);

        if($request->hasFile('image')){

            $imageName = $request->image->store('public/banners');
        }

        $banner = new Banner;
        $banner->image = $imageName;
        $banner->title_top = $request->title_top;
        $banner->title_bottom = $request->title_bottom;
        $banner->subtitle = $request->subtitle;
        $banner->button_text = $request->button_text;
        $banner->url = $request->url;

        $banner->save();


        return redirect()->back()->with('success','Banner added successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $banner = Banner::where('id',$id)->first();
        return view('admin.banner.edit',compact('banner'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'subtitle'=>'required',
            'button_text'=>'required',
            'url'=>'required',
            'image'=>'required'

        ]);

        if($request->hasFile('image')){

            $imageName = $request->image->store('public/banners');
        }

        $banner = Banner::find($id);
        $banner->image = $imageName;
        $banner->title_top = $request->title_top;
        $banner->title_bottom = $request->title_bottom;
        $banner->subtitle = $request->subtitle;
        $banner->button_text = $request->button_text;
        $banner->url = $request->url;
        $banner->save();
        return redirect()->back()->with('success','Banner updated successfully');
    }

    public function destroy($id)
    {
        Banner::where('id',$id)->delete();
        return redirect()->back()->with('success','Banner deleted');
    }
}
