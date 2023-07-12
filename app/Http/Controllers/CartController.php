<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Cart\GetShippingInfoRequest;
use App\Http\Requests\Cart\SaveShippingInfoRequest;
use App\Http\Requests\Cart\ConfirmPaymentRequest;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function getShippingInfo(GetShippingInfoRequest $request)
    {
        $response = $request->process();
        return response()->json($response);
    }

    public function saveShippingInfo(SaveShippingInfoRequest $request)
    {
        $response = $request->process($request->all());
        return response()->json($response);
    }

    public function confirmPayment(ConfirmPaymentRequest $request)
    {
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
