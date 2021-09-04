<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use Illuminate\Http\Request;

class DeliverablesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $deliverables = Deliverable::all();
        return view('admin.deliverables.show',compact('deliverables'));
    }

    public function create()
    {
        return view('admin.deliverables.create');
    }


    public function store(Request $request)
    {

        $deliverable = new Deliverable();
        if($request->hasFile('icon'))
        {
            $deliverable->icon = $request->icon->store('public/files/deliverables');
        }
        $deliverable->title = $request->title;
        $deliverable->description = $request->description;

        $deliverable->save();


        return redirect()->back()->with('success','deliverable added successfully');
    }


    public function edit($id)
    {
        $deliverable = Deliverable::find($id);
        return view('admin.deliverables.edit',compact('deliverable'));
    }


    public function update(Request $request, $id)
    {

        $deliverable = Deliverable::find($id);
        if($request->hasFile('icon'))
        {
            $deliverable->icon = $request->icon->store('public/files/deliverables');
        }
        $deliverable->title = $request->title;
        $deliverable->description = $request->description;

        $deliverable->save();

        return redirect()->back()->with('success','deliverable updated successfully');
    }

    public function destroy($id)
    {
        Deliverable::where('id',$id)->delete();
        return redirect()->back()->with('success','deliverable deleted');
    }


}
