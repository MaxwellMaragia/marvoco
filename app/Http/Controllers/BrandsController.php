<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = brand::all();
        return view('admin.brands.show',compact('brands'));
    }
    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name'=>'required',
            'url'=>'required',
        ]);

        $brand = new brand();
        $brand->name = $request->name;
        $brand->url = $request->url;

        if($request->hasFile('logo'))
        {
            $brand->logo = $request->logo->store('public/files/brands');
        }

        $brand->save();
        return redirect()->back()->with('success','brand created successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brand = brand::find($id);
        return view('admin.brands.edit',compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'url'=>'required',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->url = $request->url;

        if($request->hasFile('logo'))
        {
            $brand->logo = $request->logo->store('public/files/brands');
        }

        $brand->save();
        return redirect()->back()->with('success','brand updated successfully');
    }

    public function destroy($id)
    {
        brand::where('id',$id)->delete();
        return redirect()->back()->with('success','brand deleted successfully');
    }
}
