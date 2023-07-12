<?php

namespace App\Http\Requests\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\ShippingInfo;

class GetShippingInfoRequest extends FormRequest
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
            //
        ];
    }

    public function process()
    {
        $shipping = ShippingInfo::where('user_id',Auth::user()->id)
        ->select('id','first_name','last_name','email','address_1',
        'address_2','country','city','zipcode','user_id')->first();

        return ['shipping' => $shipping];
    }
}
