<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Chemical;
use App\Models\Deliverable;
use App\Models\Post;
use App\Models\Premier_product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
{

    public function __construct()
    {
        View::share('logo', Setting::where('name','logo')->first());
        View::share('favicon', Setting::where('name','favicon')->first());
        View::share('facebook', Setting::where('name','facebook')->first());
        View::share('linkedin', Setting::where('name','linkedin')->first());
        View::share('about_header', Setting::where('name','about_header')->first());
        View::share('about_text', Setting::where('name','about_text')->first());
        View::share('mission', Setting::where('name','mission')->first());
        View::share('mission_image', Setting::where('name','mission_image')->first());
        View::share('nairobi_tel', Setting::where('name','nairobi-tel')->first());
        View::share('nairobi_mobile_1', Setting::where('name','nairobi-mobile-1')->first());
        View::share('nairobi_mobile_2', Setting::where('name','nairobi-mobile-2')->first());
        View::share('nairobi_mobile_3', Setting::where('name','nairobi-mobile-3')->first());
        View::share('nairobi_email', Setting::where('name','nairobi-email')->first());
        View::share('nairobi_address', Setting::where('name','nairobi-address')->first());
        View::share('nairobi_map', Setting::where('name','nairobi-map-url')->first());
        View::share('webuye_tel', Setting::where('name','webuye-tel')->first());
        View::share('webuye_mobile_1', Setting::where('name','webuye-mobile-1')->first());
        View::share('webuye_mobile_2', Setting::where('name','webuye-mobile-2')->first());
        View::share('webuye_mobile_3', Setting::where('name','webuye-mobile-3')->first());
        View::share('webuye_email', Setting::where('name','webuye-email')->first());
        View::share('webuye_address', Setting::where('name','webuye-address')->first());
        View::share('webuye_map', Setting::where('name','webuye-map-url')->first());

    }
    public function home(){

        $banners = Banner::all();
        $products = Premier_product::all();
        $categories = Category::all();
        $posts = Post::all();
        $deliverables = Deliverable::all();
        $brands = brand::all();
        return view('website.home',compact('banners','products','categories','posts','deliverables','brands'));
    }

    public function blog(){
        $posts = Post::where('status',1)->paginate(5);
        return view('website.blog',compact('posts'));
    }

    public function post(post $post){
        return view('website.post',compact('post'));
    }

    public function premier_product(Premier_product $product){
        return view('website.product',compact('product'));
    }

    public function products(){
        $categories = Category::all();
        $chemicals = Chemical::all();
        return view('website.products',compact('categories','chemicals'));
    }

    public function contact(){
        return view('website.contact');
    }
}
