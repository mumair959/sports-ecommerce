<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = ProductCategory::select('id','name','image_url')
        ->withCount(['products' => function($query){
            return $query->where('active','1');
        }])->get();

        $blogs = Blog::where('active','1')->take(3)->get();
        $products = Product::where('active','1')->with(['product_images','product_category','user'])->take(6)->get();

        $sellProducts = Product::where('product_type','sell')->count();
        $rentProducts = Product::where('product_type','rent')->count();
        $exchangeProducts = Product::where('product_type','exchange')->count();

        return view('home',['categories' => $categories, 'blogs' => $blogs, 'products' => $products, 'sellProducts' => $sellProducts, 'rentProducts' => $rentProducts, 'exchangeProducts' => $exchangeProducts]);
    }
}
