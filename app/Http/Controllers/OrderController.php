<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function details(Request $request)
    {
        $order = Order::where('id',$request->id)->with(['order_items' => function($q){
            $q->with('product');
        },'user','user.shipping_infos'])->first();

        return view('order.details',['order' => $order]);
    }
}
