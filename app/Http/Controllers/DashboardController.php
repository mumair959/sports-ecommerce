<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with(['product_category','condition'])->get();
        return view('dashboard.index',['products' => $products]);
    }

    public function blogs ()
    {
        $blogs = Blog::with('author')->get();
        return view('dashboard.blogs',['blogs' => $blogs]);
    }

    public function orders ()
    {
        $orders = Order::with('user')->get();
        return view('dashboard.orders',['orders' => $orders]);
    }

    public function addNewBlog()
    {
        return view('dashboard.create_blog');
    }

    public function saveNewBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'details' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=750,height=430',
        ]);

        $imageName = time().'.'.$request->image_url->extension();  
        $request->image_url->move(public_path('assets/images/blogs'), $imageName);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->created_by = Auth::user()->id;
        $blog->active = '0';

        $blog->image_url = 'assets/images/blogs/'.$imageName;
        $blog->save();

        return back()->with('success','Blog has been created successfully');

    }

    public function updateProductStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->active = $request->active;
        $product->save();
        
        return back()->with('success','Product has been updated successfully');
    }

    public function updateBlogStatus(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->active = $request->active;
        $blog->save();
        
        return back()->with('success','Blog has been updated successfully');
    }
}
