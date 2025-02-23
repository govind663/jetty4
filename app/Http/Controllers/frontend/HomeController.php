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
use App\Models\OurUsp;
use App\Models\UniqueApproach;
use App\Models\OurManagement;
use App\Models\AboutSustainability;
use App\Models\SafetyCommitment;
use App\Models\SafetyInitiatives;
use App\Models\AboutCareer;
use App\Models\CurrentOpening;
use App\Models\ContactDetails;
use App\Models\MediaEvents;
use App\Models\MediaEventsDetails;
use App\Models\Projects;
use App\Models\ProjectDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // === Home
    public function index(Request $request)
    {
        // ===== Banner
        $banners = Banner::orderBy("id","asc")->whereNull('deleted_at')->get();

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

    // ==== Projects
    public function projects(Request $request, $project_id)
    {
        // ===== Projects
        $projects = Projects::with('projectType')
                            ->where('project_type_id', $project_id)
                            ->orderBy("id","desc")
                            ->whereNull('deleted_at')
                            ->first();
        // dd($projects);

        return view('frontend.projects',[
            'projects' => $projects
        ]);
    }

    // ==== Project Details
    public function projectDetails(Request $request, $project_slug)
    {
        // ===== Projects
        $projectDetails = ProjectDetails::with('projectName')->where('project_slug', $project_slug)->orderBy("id","desc")->whereNull('deleted_at')->first();
        // dd($projectDetails);

        // If no project found, redirect back with an error message
        if (!$projectDetails) {
            return redirect()->back()->with('error', 'Project not found');
        }

        $projectDetails->image = $projectDetails->image ? json_decode($projectDetails->image, true) : [];
        // dd($projectDetails->image);

        return view('frontend.project-details',[
            'projectDetails' => $projectDetails
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
        $ourUsps = OurUsp::orderBy("id", "desc")->whereNull('deleted_at')->first();

        // Decode each JSON column
        $ourUsps->baner_image = json_decode($ourUsps->baner_image, true);
        $ourUsps->banner_icon = json_decode($ourUsps->banner_icon, true);
        $ourUsps->banner_title = json_decode($ourUsps->banner_title, true);
        $ourUsps->banner_description = json_decode($ourUsps->banner_description, true);


        $uniqueApproaches = UniqueApproach::orderBy("id","desc")->whereNull('deleted_at')->first();
        $uniqueApproaches->service_name = json_decode($uniqueApproaches->service_name, true);
        $uniqueApproaches->service_description = json_decode($uniqueApproaches->service_description, true);

        $ourManagements = OurManagement::orderBy("id","desc")->whereNull('deleted_at')->first();

        $ourManagements->quality_icon = json_decode($ourManagements->quality_icon, true);
        $ourManagements->quality_title = json_decode($ourManagements->quality_title, true);
        $ourManagements->quality_description = json_decode($ourManagements->quality_description, true);

        return view('frontend.our-usp', [
            'ourUsps' => $ourUsps,
            'uniqueApproaches' => $uniqueApproaches,
            'ourManagements' => $ourManagements
        ]);
    }

    // === Sustainability
    public function sustainability(Request $request)
    {
        $aboutSustainability = AboutSustainability::orderBy("id","desc")->whereNull('deleted_at')->first();
        $aboutSustainability->pillers_title = json_decode($aboutSustainability->pillers_title, true);
        $aboutSustainability->pillers_description = json_decode($aboutSustainability->pillers_description, true);

        $safetycommitment = SafetyCommitment::orderBy("id","desc")->whereNull('deleted_at')->first();

        $safetyinitiatives = SafetyInitiatives::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('frontend.sustainability',[
            'aboutSustainability' => $aboutSustainability,
            'safetycommitment' => $safetycommitment,
            'safetyinitiatives' => $safetyinitiatives
        ]);
    }

    // === Careers
    public function careers(Request $request)
    {
        $about_career = AboutCareer::orderBy("id","desc")->whereNull('deleted_at')->first();

        $current_openings = CurrentOpening::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('frontend.careers',[
            'about_career' => $about_career,
            'current_openings' => $current_openings
        ]);
    }

    // === Media & Events
    public function mediaEvents(Request $request)
    {
        $media_events = MediaEvents::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('frontend.media-events',[
            'media_events' => $media_events
        ]);
    }

    // === Media & Events Details
    public function mediaEventsDetails(Request $request, $slug)
    {
        $media_events_details = MediaEventsDetails::with('mediaEvents')
                                ->where('slug', $slug)
                                ->orderBy("id","desc")
                                ->whereNull('deleted_at')
                                ->first();

        $media_events_details->event_gallery_images = json_decode($media_events_details->event_gallery_images, true);

        return view('frontend.media-events-details',[
            'media_events_details' => $media_events_details
        ]);
    }

    // === Contact Us
    public function contact(Request $request)
    {
        $contactDetails = ContactDetails::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.contact',[
            'contactDetails' => $contactDetails
        ]);
    }

    // === Under Construction
    public function underConstruction(Request $request)
    {
        return view('frontend.under-construction');
    }

    // === Thank You
    public function thankYou(Request $request)
    {
        return view('frontend.thank-you');
    }
}
