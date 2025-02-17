<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Statistics;
use App\Models\AboutJ4C;
use App\Models\Teams;
use App\Models\Client;
use App\Models\Associate;
use App\Models\ConstructionSolutions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // === Home
    public function index(Request $request)
    {
        // ===== Banner
        $banners = Banner::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ===== Statistics
        $statistics = Statistics::orderBy("id","desc")->whereNull('deleted_at')->get();

        // ===== About J4C
        $aboutj4c = AboutJ4C::orderBy("id","desc")->whereNull('deleted_at')->first();

        // ===== Construction Solutions
        $constructionSolutions = ConstructionSolutions::orderBy("id","desc")->whereNull('deleted_at')->first();

        // Decode JSON fields
        $solutions = json_decode($constructionSolutions->solution_name, true);
        $descriptions = json_decode($constructionSolutions->solution_description, true);

        // ===== Teams
        $teams = Teams::orderBy("id","desc")->whereNull('deleted_at')->first();

        // ===== Clients
        $clients = Client::orderBy("id","desc")->whereNull('deleted_at')->first(); // Fetch all clients, not just the first
        $clientsImages = json_decode($clients->pluck('image')->implode(','), true); // Decode all client images if necessary

        // ===== Associates
        $associate = Associate::orderBy("id","desc")->whereNull('deleted_at')->first(); // Fetch all associates, not just the first
        $associateImages = json_decode($associate->pluck('image')->implode(','), true); // Decode all associate images if necessary

        return view('frontend.home', [
            'banners' => $banners,
            'statistics' => $statistics,
            'aboutj4c' => $aboutj4c,
            'constructionSolutions' => $constructionSolutions,
            'solutions' => $solutions,
            'descriptions' => $descriptions,
            'teams' => $teams,
            'clients' => $clients, // Pass all clients to the view
            'clientsImages' => $clientsImages,
            'associate' => $associate, // Pass all associates to the view
            'associateImages' => $associateImages
        ]);
    }

    // ==== About Us
    public function aboutUs(Request $request)
    {
        return view('frontend.about-us');
    }

    // === Mission & Vision
    public function missionVision(Request $request)
    {
        return view('frontend.mission-vision');
    }

    // === Awards & Certifications
    public function awardsCertifications(Request $request)
    {
        return view('frontend.awards-certifications');
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