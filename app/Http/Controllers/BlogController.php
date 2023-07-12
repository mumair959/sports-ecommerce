<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('author')->where('active','1')->get();
        return view('blog.index',['blogs' => $blogs]);
    }

    public function details(Request $request)
    {
        $blog = Blog::find($request->id);
        $latest_blogs = Blog::where('active','1')->get();
        return view('blog.detail',['blog' => $blog, 'latest_blogs' => $latest_blogs]);
    }
}
