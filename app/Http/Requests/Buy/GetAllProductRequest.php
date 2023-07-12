<?php

namespace App\Http\Requests\Buy;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class GetAllProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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

    public function process($req)
    {
        $category_id = (empty($req['category_id']) || $req['category_id'] == 'null') ? null : $req['category_id'];
        $condition_id = empty($req['condition_id']) ? null : $req['condition_id'];
        $price_range = empty($req['price_range']) ? null : $req['price_range'];

        $products = Product::where(['active' => '1', 'product_type' => $req['type']])
        ->when($category_id, function ($sub_q1) use ($category_id){
            $sub_q1->where('product_category_id',$category_id);
        })
        ->when($condition_id, function ($sub_q2) use ($condition_id){
            $sub_q2->where('condition_id',$condition_id);
        })
        ->when($price_range, function ($sub_q3) use ($price_range){
            $sub_q3->where('regular_price','<=',$price_range);
        })
        ->with(['product_category','user','product_images'])->get();

        return ['products' => $products];
    }
}
