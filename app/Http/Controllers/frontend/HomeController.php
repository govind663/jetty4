<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // === Home
    public function index(Request $request)
    {
        return view('frontend.home');
    }

    // ==== About Us
    public function aboutUs(Request $request)
    {
        return view('frontend.about-us');
    }

    // ==== Our USP
    public function ourUsp(Request $request)
    {
        return view('frontend.our-usp');
    }

    // === Sustainability
    public function sustainability(Request $request)
    {
        return view('frontend.sustainability');
    }

    // === Careers
    public function careers(Request $request)
    {
        return view('frontend.careers');
    }

    // === Media & Events
    public function mediaEvents(Request $request)
    {
        return view('frontend.media-events');
    }

    // === Contact Us
    public function contact(Request $request)
    {
        return view('frontend.contact');
    }
}
