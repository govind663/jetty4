@extends('frontend.layouts.master')

@section('title')
    J4C Group | {{ $projectDetails->projectName->project_name ?? '' }}
@endsection

@push('styles')
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area" style="background-image: url({{ asset('/j4c_Group/project_details/breadcrumbs_image/' . $breadcrumbs->breadcrumbs_image) }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="breadcumb-content">
                        <div class="breadcumb-title">
                            <h4>{{ $projectDetails->projectName->project_name ?? '' }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-new-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-sub-sec">
                        <ul>
                            <li><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li>{{ $projectDetails->projectName->project_name ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <div class="page-project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-title-sec">
                        <h1>{{ $projectDetails->projectName->project_name ?? '' }}</h1>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Project Single Content Start -->
                    <div class="product-shop-detail-wrapper">
                        @php
                            $images = $projectDetails->image;
                            $uniqueImages = $images;
                        @endphp

                        <!-- Main Slider -->
                        @if(count($uniqueImages) > 0)
                            <div class="owl-carousel main-slider pro-details-slider-sec">
                                @foreach ($uniqueImages as $projectImage)
                                    <div class="pro-detail-magic-zoom">
                                        <img src="{{ asset('/j4c_Group/project_details/image/' . $projectImage) }}" alt="{{ $projectImage }}">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Thumbnail Slider (Only Show If More Than One Unique Image) -->
                            {{-- @if(count($uniqueImages) > 1) --}}
                                <div class="owl-carousel thumbnail-slider pro-details-thumbnail-nav-sec">
                                    @foreach ($uniqueImages as $projectImage)
                                        <div class="pro-details-thum-sec">
                                            <img src="{{ asset('/j4c_Group/project_details/image/' . $projectImage) }}" alt="{{ $projectImage }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        {{-- @endif --}}
                    </div>
                    <!-- Project Single Content End -->
                </div>

                <div class="col-lg-4">
                    <!-- Project Sidebar Start -->
                    <div class="project-sidebar">
                        <div class="project-info-box wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->projectName->project_location))
                            <div class="project-info-item">

                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/location-icon.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>Location</p>
                                        <h3>{{ $projectDetails->projectName->project_location ?? '' }}</h3>
                                    </div>

                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->

                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->built_up_area))
                            <div class="project-info-item">
                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/built-up-area.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>Built up Area </p>
                                        <h3>{{ $projectDetails->built_up_area ?? '' }}</h3>
                                    </div>
                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->

                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->it_load))
                            <div class="project-info-item">

                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/it-load.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>IT Load</p>
                                        <h3>{{ $projectDetails->it_load ?? '' }}</h3>
                                    </div>

                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->

                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->developers))
                            <div class="project-info-item">

                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/developers.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>Developers</p>
                                        <h3>{{ $projectDetails->developers ?? '' }}</h3>
                                    </div>

                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->

                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->client_name))
                            <div class="project-info-item">

                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/client-name.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>Client Name</p>
                                        <h3>{{ $projectDetails->client_name ?? '' }}</h3>
                                    </div>

                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->

                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->structural_consultant))
                            <div class="project-info-item">

                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/structural-consultant.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>Structural Consultant</p>
                                        <h3>{{ $projectDetails->structural_consultant ?? '' }}</h3>
                                    </div>

                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->

                            <!-- Portfolio Info Item Start -->
                            @if (!empty($projectDetails->architect))
                            <div class="project-info-item">

                                    <div class="icon-box">
                                        <img src="{{ asset('frontend/assets/images/icons/architect.png') }}" alt="">
                                    </div>
                                    <div class="project-info-content">
                                        <p>Architect</p>
                                        <h3>{{ $projectDetails->architect ?? '' }}</h3>
                                    </div>

                            </div>
                            @endif
                            <!-- Portfolio Info Item End -->
                        </div>
                    </div>
                    <!-- Project Sidebar End -->
                </div>
            </div>
        </div>
    </div>

    <div class="project-area completed-project-area related-project-details-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="related-project-details-title-sec">
                        <h1>Related Projects</h1>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6">
                    @php
                        use App\Models\Projects;

                        // Assuming you have a current project to compare with
                        $currentProject = Projects::find($projectDetails->projects_id); // Replace with actual project ID
                        $projectTypeId = $currentProject->project_type_id;

                        if ($currentProject) {
                            $relatedProjects = Projects::with('projectType')
                                ->where('project_type_id', $projectTypeId)
                                ->whereNull('deleted_at')
                                ->orderBy("id", "desc")
                                ->get();
                        } else {
                            $relatedProjects = collect(); // Empty collection if no project found
                        }
                    @endphp
                    <div class="row">
                        <!-- Project Details Slider -->
                        <div class="project-details-list-slider-1 owl-carousel owl-theme">
                            @foreach ($relatedProjects as $project)
                                @php

                                    $projectType = '';
                                    if ($project->project_type_id == '1') {
                                        $projectType = 'Data Center Projects';
                                    } elseif ($project->project_type_id == '2') {
                                        $projectType = 'Commercial Projects';
                                    } elseif ($project->project_type_id == '3') {
                                        $projectType = 'Residential Projects';
                                    }
                                @endphp
                                <div class="item">
                                    <div class="project_details_img_sec">
                                        <img src="{{ asset('/j4c_Group/projects/image/' . $project->image) }}" alt="Data Center 9">
                                        <div class="project_text">
                                            <h4>{{ $projectType ?? '' }}</h4>
                                            <h3>{{ $project->project_name ?? '' }}</h3>
                                            <p><i class="fa fa-map-marker"></i> {{ $project->project_location ?? '' }}</p>
                                            <a href="{{ route('frontend.project-details', ['project_slug' => $project->slug]) }}"><span>&#x2197;</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<!-- jQuery (Required for Owl Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {
        // Main Slider
        $(".main-slider").owlCarousel({
            items: 1
            , loop: true
            , margin: 10
            , nav: false
            , navText: ["<span class='arrow-prev'>&#x2039;</span>", "<span class='arrow-next'>&#x203A;</span>"]
            , dots: false
            , thumbs: true
            , thumbImage: false
            , thumbContainerClass: "owl-thumbs"
            , thumbItemClass: "owl-thumb-item"
        , });

        // Thumbnail Slider
        $(".thumbnail-slider").owlCarousel({
            items: 6, // Default items for larger screens
            margin: 10, // Space between items
            nav: false, // Navigation disabled for thumbnails
            dots: false, // Dots disabled for thumbnails
            center: false, // No centering for thumbnails
            loop: false, // Infinite loop
            responsive: {
                0: {
                    items: 4
                    , margin: 10
                }, // 2 items for mobile screens with reduced margin
                480: {
                    items: 3
                    , margin: 15
                }, // 3 items for small tablets
                768: {
                    items: 4
                    , margin: 20
                }, // 4 items for tablets and up
                1200: {
                    items: 6
                    , margin: 10
                }, // 5 items for desktops
            }
        , });

        // Linking thumbnails to main slider
        $(".thumbnail-slider .owl-item").on("click", function() {
            const index = $(this).index();
            $(".main-slider").trigger("to.owl.carousel", [index, 300]);
        });
    });
</script>

@endpush
