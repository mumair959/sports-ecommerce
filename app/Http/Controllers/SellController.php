<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Condition;

class SellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = ProductCategory::pluck('name','id')->toArray();
        $conditions = Condition::pluck('name','id')->toArray();
        return view('sell.index',['categories' => $categories, 'conditions' => $conditions]);
    }

    public function addNewProduct(Request $request)
    {
        $request->validate([
            'product_category_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'offer_price' => 'required|numeric',
            'condition_id' => 'required|numeric',
            'product_images' => 'required|array',
            'product_images.*' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=750,height=430',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->condition_id = $request->condition_id;
        $product->product_category_id = $request->product_category_id;
        $product->product_type = $request->product_type;
        $product->added_by = Auth::user()->id;

        DB::transaction(function () use ($product,$request){
            $product->save();

            foreach ($request->product_images as $img) {
                $imageName = $img->getClientOriginalName();  
                $img->move(public_path('assets/images/products/'.$product->id), $imageName);
                
                $product_img = new ProductImage();
                $product_img->product_id = $product->id;
                $product_img->image_path = 'assets/images/products/'.$product->id.'/'.$imageName;
                $product_img->save();
            }

        });

        return back()->with('success','Product has been added successfully');
    }
}
