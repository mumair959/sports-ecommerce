<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Condition;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['add_items']);
    }

    public function find_items()
    {
        return view('rent.find_items');
    }

    public function add_items()
    {
        $categories = ProductCategory::pluck('name','id')->toArray();
        $conditions = Condition::pluck('name','id')->toArray();
        return view('rent.add_items',['categories' => $categories, 'conditions' => $conditions]);
    }
}
