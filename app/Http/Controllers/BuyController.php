<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Buy\GetAllProductRequest;
use App\Http\Requests\Buy\GetAllProductCategoriesRequest;
use App\Http\Requests\Buy\GetAllConditionsRequest;

class BuyController extends Controller
{
    public function index(Request $request)
    {
        return view('buy.index',['category_id' => $request->category_id]);
    }

    public function getAllProducts(GetAllProductRequest $request)
    {
        $response = $request->process($request->all());
        return response()->json($response);
    }

    public function getAllProductCategories(GetAllProductCategoriesRequest $request)
    {
        $response = $request->process();
        return response()->json($response);
    }

    public function getAllCondtions(GetAllConditionsRequest $request)
    {
        $response = $request->process();
        return response()->json($response);
    }
}
