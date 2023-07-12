<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function details(Request $request)
    {
        $product = Product::where('id',$request->id)->with(['product_category','product_images','user'])->first();
        return view('product.details',['product' => $product]);
    }
}
