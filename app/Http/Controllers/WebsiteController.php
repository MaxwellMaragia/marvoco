<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Premier_product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){

        $banners = Banner::all();
        $products = Premier_product::all();
        $categories = Category::all();
        $posts = Post::all();
        return view('website.home',compact('banners','products','categories','posts'));
    }
}
