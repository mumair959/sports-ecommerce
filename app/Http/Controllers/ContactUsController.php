<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactUs\SendContactUsEmailRequest;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact_us.index');
    }

    public function sendContactUsEmail(SendContactUsEmailRequest $request)
    {
        $response = $request->process($request->all());
        return response()->json($response);
    }
}
