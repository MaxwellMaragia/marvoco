<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $reviews = Review::all();
        return view('admin.reviews.show',compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'review' => 'required',
            'name'=>'required|unique:reviews',
        ]);

        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->review;
        $review->status = $request->status;

        if($request->hasFile('avatar'))
        {

            $review->avatar = $request->avatar->store('public/files/reviews');
        }

        $review->save();
        return redirect()->back()->with('success','review created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $review = Review::where('id',$id)->first();
        return view('admin.reviews.edit',compact('review'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'review' => 'required',
            'name'=>'required',

        ]);

        $review = Review::find($id);
        $review->name = $request->name;
        $review->review = $request->review;
        $review->status = $request->status;

        if($request->hasFile('avatar'))
        {
            $current_image = 'storage/files/reviews/'.substr($review->avatar,26);

            //delete old review first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $review->avatar = $request->avatar->store('public/files/reviews');
        }

        $review->save();
        return redirect()->back()->with('success','review updated successfully');
    }


    public function destroy($id)
    {
        $review = Review::find($id);
        $current_image = 'storage/files/reviews/'.substr($review->avatar,26);

        //delete old review first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        Review::where('id',$id)->delete();
        return redirect()->back()->with('success','Review deleted successfully');
    }
}
