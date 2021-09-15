<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.show',compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required|unique:posts',
            'subtitle'=>'required',
            'body'=>'required'

        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->image = $request->image->store('public/files/posts');
        $post->save();
        return redirect()->back()->with('success','post added successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required'

        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->status = $request->status;
        if($request->hasFile('image'))
        {
            $post->image = $request->image->store('public/files/posts');
        }

        $post->save();
        return redirect()->back()->with('success','post updated successfully');
    }

    public function destroy($id)
    {
        //
    }
}
