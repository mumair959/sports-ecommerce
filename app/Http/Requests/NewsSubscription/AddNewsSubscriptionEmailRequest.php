<?php

namespace App\Http\Requests\NewsSubscription;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\SubscriptionEmail;

class AddNewsSubscriptionEmailRequest extends FormRequest
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
            'email' => 'required|email|unique:subscription_emails,email',
        ];
    }

    public function process($req)
    {
        try {
            $subscribe = new SubscriptionEmail();
            $subscribe->email = $req['email'];
            $subscribe->save();
            
            return ['success' => true, 'msg' => 'Email has been added successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
