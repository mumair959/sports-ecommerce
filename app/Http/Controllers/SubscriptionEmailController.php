<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsSubscription\AddNewsSubscriptionEmailRequest;

class SubscriptionEmailController extends Controller
{
    public function addSubscriptionEmail(AddNewsSubscriptionEmailRequest $request)
    {
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
