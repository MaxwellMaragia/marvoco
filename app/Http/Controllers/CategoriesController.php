<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.show',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[

            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name'=>'required|unique:categories',
            'description'=>'required'

        ]);

        if($request->hasFile('image')){

            $imageName = $request->image->store('public/categories');
        }

        $category = new Category();
        $category->image = $imageName;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);

        $category->save();


        return redirect()->back()->with('success','category added successfully');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name'=>'required',
            'description'=>'required'

        ]);

        $category = Category::find($id);

        if($request->hasFile('image')){

            $category->image = $request->image->store('public/categories');
        }


        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);

        $category->save();


        return redirect()->back()->with('success','category updated successfully');
    }


    public function destroy($id)
    {
        //
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','Category deleted');
    }
}
