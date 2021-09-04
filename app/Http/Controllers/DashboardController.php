<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chemical;
use App\Models\Post;
use App\Models\Premier_product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories = Category::all();
        $products = Premier_product::all();
        $chemicals = Chemical::all();
        $posts = Post::all();
        return view('admin.dashboard',compact('categories','products','chemicals','posts'));
    }
}
