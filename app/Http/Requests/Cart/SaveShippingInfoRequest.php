<?php

namespace App\Http\Requests\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\ShippingInfo;

class SaveShippingInfoRequest extends FormRequest
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
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address_1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
        ];
    }

    public function process($req)
    {
        $shipping = ShippingInfo::where('user_id',Auth::user()->id)->first();

        if (empty($shipping)) {
            $shipping = new ShippingInfo();
        }

        $shipping->first_name = $req['first_name'];
        $shipping->last_name = $req['last_name'];
        $shipping->email = $req['email'];
        $shipping->address_1 = $req['address_1'];
        $shipping->address_2 = empty($req['address_2']) ? null : $req['address_2'];
        $shipping->country = $req['country'];
        $shipping->city = $req['city'];
        $shipping->zipcode = $req['zipcode'];
        $shipping->user_id = Auth::user()->id;

        try {
            $shipping->save();
            return ['success' => true, 'msg' => 'Shipping info has been saved successfully'];
        } catch (\Exception $e) {
            return ['error' => true, 'msg' => $e->getMessage()];
        }
    }
}
