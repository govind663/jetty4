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
use App\Models\WhoWeAre;
use App\Models\OurMission;
use App\Models\OurVission;
use App\Models\Award;
use App\Models\Certification;
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
        // ===== About J4C
        $aboutj4c = AboutJ4C::orderBy("id","desc")->whereNull('deleted_at')->first();

        // ===== Who We Are
        $whoweare = WhoWeAre::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.about-us',[
            'aboutj4c'=> $aboutj4c,
            'whoweare' => $whoweare,
        ]);
    }

    // === Mission & Vision
    public function missionVision(Request $request)
    {
        // ==== Our Mission
        $ourmission = OurMission::orderBy("id","desc")->whereNull('deleted_at')->first();

        // ==== Our Vision
        $ourvision = OurVission::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.mission-vision',[
            'ourmission' => $ourmission,
            'ourvision' => $ourvision
        ]);
    }

    // === Awards & Certifications
    public function awardsCertifications(Request $request)
    {
        // ==== Awards
        $awards = Award::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ==== Certifications
        $certifications = Certification::orderBy("id","asc")->whereNull('deleted_at')->get();

        return view('frontend.awards-certifications',[
            'awards' => $awards,
            'certifications' => $certifications
        ]);
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
