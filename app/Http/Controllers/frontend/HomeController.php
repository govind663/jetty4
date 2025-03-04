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
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\sendContactMail;
use App\Models\ProjectType;
use App\Models\ProjectStatusDetails;
use App\Models\Breadcrumb;
use App\Models\CarrierDetails;
use Illuminate\Support\Facades\Mail;

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

        $completedProjects = Projects::with('projectType')
                            ->where('project_status', 1)
                            ->orderBy('id', 'desc')
                            ->whereNull('deleted_at')
                            ->get();
        // dd($completedProjects);
        $projectsStatus = '';

        if ($completedProjects->isNotEmpty()) {
            $statusCounts = $completedProjects->groupBy('project_status')->map->count();

            if (isset($statusCounts[1])) {
                $projectsStatus = 'Completed Projects';
            } elseif (isset($statusCounts[2])) {
                $projectsStatus = 'Ongoing Projects';
            } elseif (isset($statusCounts[3])) {
                $projectsStatus = 'Upcoming Projects';
            }
        }

        $ongoingProjects = Projects::with('projectType')
                            ->where('project_status', 2)
                            ->orderBy('id', 'desc')
                            ->whereNull('deleted_at')
                            ->get();

        $ongoingProjectsStatus = '';
        if ($ongoingProjects->isNotEmpty()) {
            $statusCounts = $ongoingProjects->groupBy('project_status')->map->count();

            if (isset($statusCounts[1])) {
                $ongoingProjectsStatus = 'Completed Projects';
            } elseif (isset($statusCounts[2])) {
                $ongoingProjectsStatus = 'Ongoing Projects';
            } elseif (isset($statusCounts[3])) {
                $ongoingProjectsStatus = 'Upcoming Projects';
            }
        }

        // ===== Fetching Project Status Details
        $projectStatusDetails = ProjectStatusDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

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
            'associateImages' => $associateImages,
            'completedProjects' => $completedProjects,
            'projectsStatus' => $projectsStatus,
            'ongoingProjects' => $ongoingProjects,
            'ongoingProjectsStatus' => $ongoingProjectsStatus,
            'projectStatusDetails' => $projectStatusDetails,
        ]);
    }

    // ==== About Us
    public function aboutUs(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 1)->whereNull('deleted_at')->first();

        // ===== About J4C
        $aboutj4c = AboutJ4C::orderBy("id","desc")->whereNull('deleted_at')->first();

        // ===== Who We Are
        $whoweare = WhoWeAre::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.about-us',[
            'breadcrumbs' => $breadcrumbs,
            'aboutj4c'=> $aboutj4c,
            'whoweare' => $whoweare,
        ]);
    }

    // ==== Projects
    public function projects(Request $request, $slug)
    {

        $project_id = ProjectType::where('slug', $slug)->pluck('id')->first();

        // ===== Breadcrumbs Images
        $breadcrumbs = ProjectType::orderBy("id","desc")->where('slug', $slug)->whereNull('deleted_at')->first();
        // dd($breadcrumbs);        

        // ===== Projects
        $projects = Projects::with('projectType')
                            ->where('id', $project_id)
                            ->orderBy("id","desc")
                            ->whereNull('deleted_at')
                            ->get();
        // dd($projects);

        // Project Type Fetch by project_type_id
        $projectsTypeName = ProjectType::where('id', $project_id)->pluck('project_type')->first();
        // dd($projectsTypeName);

        // If no project found, redirect back with an error message
        if (!$projects) {
            return redirect()->back()->with('error', 'Project not found');
        }

        return view('frontend.projects',[
            'breadcrumbs' => $breadcrumbs,
            'projects' => $projects,
            'projectTypeId' =>  $project_id,
            'projectsTypeName' => $projectsTypeName,
        ]);
    }

    // ==== Project Details
    public function projectDetails(Request $request, $project_slug)
    {
        // ===== Projects
        $projectDetails = ProjectDetails::with('projectName')->where('slug', $project_slug)->orderBy("id","desc")->whereNull('deleted_at')->first();
        // dd($projectDetails);

        // If no project found, redirect back with an error message
        if (!$projectDetails) {
            return redirect()->back()->with('error', 'Project not found');
        }

        $projectDetails->image = $projectDetails->image ? json_decode($projectDetails->image, true) : [];
        // dd($projectDetails->image);

        // ===== Breadcrumbs Images
        $breadcrumbs = ProjectDetails::orderBy("id","desc")->where('slug', $project_slug)->whereNull('deleted_at')->first();
        // dd($breadcrumbs);

        return view('frontend.project-details',[
            'projectDetails' => $projectDetails,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // === Mission & Vision
    public function missionVision(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 2)->whereNull('deleted_at')->first();

        // ==== Our Mission
        $ourmission = OurMission::orderBy("id","desc")->whereNull('deleted_at')->first();

        // ==== Our Vision
        $ourvision = OurVission::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.mission-vision',[
            'breadcrumbs' => $breadcrumbs,
            'ourmission' => $ourmission,
            'ourvision' => $ourvision
        ]);
    }

    // === Awards & Certifications
    public function awardsCertifications(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 3)->whereNull('deleted_at')->first();

        // ==== Awards
        $awards = Award::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ==== Certifications
        $certifications = Certification::orderBy("id","asc")->whereNull('deleted_at')->get();

        return view('frontend.awards-certifications',[
            'breadcrumbs' => $breadcrumbs,
            'awards' => $awards,
            'certifications' => $certifications
        ]);
    }

    // ==== Our USP
    public function ourUsp(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 4)->whereNull('deleted_at')->first();

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
            'breadcrumbs' => $breadcrumbs,
            'ourUsps' => $ourUsps,
            'uniqueApproaches' => $uniqueApproaches,
            'ourManagements' => $ourManagements
        ]);
    }

    // === Sustainability
    public function sustainability(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 5)->whereNull('deleted_at')->first();
        
        $aboutSustainability = AboutSustainability::orderBy("id","desc")->whereNull('deleted_at')->first();
        $aboutSustainability->pillers_title = json_decode($aboutSustainability->pillers_title, true);
        $aboutSustainability->pillers_description = json_decode($aboutSustainability->pillers_description, true);

        $safetycommitment = SafetyCommitment::orderBy("id","desc")->whereNull('deleted_at')->first();

        $safetyinitiatives = SafetyInitiatives::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('frontend.sustainability',[
            'breadcrumbs' => $breadcrumbs,
            'aboutSustainability' => $aboutSustainability,
            'safetycommitment' => $safetycommitment,
            'safetyinitiatives' => $safetyinitiatives
        ]);
    }

    // === Careers
    public function careers(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 6)->whereNull('deleted_at')->first();

        $about_career = AboutCareer::orderBy("id","desc")->whereNull('deleted_at')->first();

        $current_openings = CurrentOpening::orderBy("id","desc")->whereNull('deleted_at')->get();

        $carrier_details = CarrierDetails::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.careers',[
            'breadcrumbs' => $breadcrumbs,
            'about_career' => $about_career,
            'current_openings' => $current_openings,
            'carrier_details' => $carrier_details
        ]);
    }

    // === Media & Events
    public function mediaEvents(Request $request)
    {
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 7)->whereNull('deleted_at')->first();

        $media_events = MediaEvents::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('frontend.media-events',[
            'breadcrumbs' => $breadcrumbs,
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
        // ===== Breadcrumbs
        $breadcrumbs = Breadcrumb::orderBy("id","desc")->where('page_type', 8)->whereNull('deleted_at')->first();

        $contactDetails = ContactDetails::orderBy("id","desc")->whereNull('deleted_at')->first();

        return view('frontend.contact',[
            'breadcrumbs' => $breadcrumbs,
            'contactDetails' => $contactDetails
        ]);
    }

    // === Store Contact Form
    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'phone.required' => 'Phone is required',
            'subject.required' => 'Subject is required',
            'message.required' => 'Message is required',
        ]);

        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->inserted_at = Carbon::now();
        $contactUs->save();

        $update = [
            'inserted_by' => $contactUs->id,
            'inserted_at' => Carbon::now()
        ];

        ContactUs::where('id', $contactUs->id)->update($update);

        // Send Mail
        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->messege,
        ];

        // Send Mail codingthunder1997@gmail.com
        Mail::to('codingthunder1997@gmail.com', 'J4C Group')
            ->cc(['shweta@matrixbricks.com'])
            ->send(new sendContactMail($mailData));

        return redirect()->route('frontend.thank-you')->with('success', 'Your message has been sent successfully');

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
