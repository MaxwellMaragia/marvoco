<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chemical;
use Illuminate\Http\Request;

class ChemicalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chemicals = Chemical::all();
        return view('admin.chemicals.show',compact('chemicals'));
    }


    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.chemicals.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $chemical = new Chemical();
        $chemical->category = $request->category;
        $chemical->product = $request->product;
        $chemical->specification = $request->specification;
        $chemical->packaging = $request->packaging;
        $chemical->cas = $request->cas;

        $chemical->save();
        return redirect()->back()->with('success','Chemical added successfully');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $chemical = Chemical::find($id);
        return view('admin.chemicals.edit',compact('categories','chemical'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
