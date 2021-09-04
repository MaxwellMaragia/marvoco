<?php

namespace App\Http\Controllers;

use App\Models\Premier_product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Premier_product::all();
        return view('admin.products.show',compact('products'));
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[

            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name'=>'required|unique:premier_products',
            'title'=>'required',
            'description'=>'required'

        ]);

        if($request->hasFile('image')){

            $imageName = $request->image->store('public/products');
        }

        $premier_product = new Premier_product();
        $premier_product->image = $imageName;
        $premier_product->name = $request->name;
        $premier_product->title = $request->title;
        $premier_product->description = $request->description;
        $premier_product->slug = Str::slug($request->name);

        $premier_product->save();


        return redirect()->back()->with('success','premier_product added successfully');
    }


    public function edit($id)
    {
        $product = Premier_product::find($id);
        return view('admin.products.edit',compact('product'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name'=>'required',
            'title'=>'required',
            'description'=>'required'

        ]);

        $premier_product = Premier_product::find($id);

        if($request->hasFile('image')){

            $premier_product->image  = $request->image->store('public/products');
        }


        $premier_product->name = $request->name;
        $premier_product->title = $request->title;
        $premier_product->description = $request->description;
        $premier_product->slug = Str::slug($request->name);

        $premier_product->save();


        return redirect()->back()->with('success','premier_product updated successfully');
    }


    public function destroy($id)
    {
        //
        Premier_product::where('id',$id)->delete();
        return redirect()->back()->with('success','premier_product deleted');
    }
}
