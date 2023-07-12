<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function about()
    {
        return view('static_pages.about');
    }

    public function faq()
    {
        return view('static_pages.faq');
    }

    public function privacyPolicy()
    {
        return view('static_pages.privacy_policy');
    }

    public function termsAndConditions()
    {
        return view('static_pages.terms_and_conditions');
    }
}
