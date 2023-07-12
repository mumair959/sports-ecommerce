<?php

namespace App\Http\Requests\Cart;

use Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\ShippingInfo;
use App\Models\Order;
use App\Models\OrderItem;

class ConfirmPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (request()->payment_method == 'card') {
            return [
                'card_number' => 'required|numeric',
                'expiry_month' => 'required',
                'expiry_year' => 'required|numeric',
                'cvv' => 'required|numeric',
            ];
        } else {
            return [
                
            ];
        } 
    }

    public function process($req)
    {
        $cart = $req['cart'];
        $shipmentInfo = ShippingInfo::where('user_id',Auth::user()->id)->first();

        if (empty($shipmentInfo)) {
            return ['type' => 'error', 'title' => 'Oops!', 'msg' => 'Add shipping info first to proceed'];
        } else {
            try {
                $order = new Order();
                $order->ordernum = $this->generateOrderNum();
                $order->total_amount = $cart['total'];
                $order->user_id = Auth::user()->id;

                if ($req['payment_method'] == 'card') {
                    if (!$this->createPayment($req['stripe_token'],$cart['total'],Auth::user()->name)) {
                        return ['type' => 'error', 'title' => 'Oops!', 'msg' => 'Payment process failed, Please try again later'];
                    }
                }

                DB::transaction(function () use ($order,$cart){
                    $order->save();
                    foreach ($cart['items'] as $item) {
                        $order_item = new OrderItem();
                        $order_item->order_id = $order->id;
                        $order_item->product_id = $item['id'];
                        $order_item->amount = $item['price'];
                        $order_item->quantity = 1;
                        $order_item->save();
                    }
                });

                return ['type' => 'success', 'title' => 'Great!', 'msg' => 'Order has been placed successfully'];
            } catch (\Exception $ex) {
                return ['type' => 'error', 'title' => 'Oops!', 'msg' => $ex->getMessage()];
            }
        }   
    }

    public function generateOrderNum()
    {
        $orderCount = Order::count();
        $orderCount++;
        return 'order-'.str_pad($orderCount, 5, '0', STR_PAD_LEFT);
    }

    public function createPayment($stripe_token,$amount,$customer){
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $amount*100,
                    "currency" => "usd",
                    "source" => $stripe_token,
                    "description" => "Test payment from ".$customer." to sportees" 
            ]);
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
