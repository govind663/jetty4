@extends('frontend.layouts.master')

@section('title')
    J4C Group | {{ $projects->projectType->project_type ?? '' }}
@endsection

@push('styles')
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area" style="background-image: url({{ asset('frontend/assets/images/banner/about_bg.jpg') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="breadcumb-content">
                        <div class="breadcumb-title">
                            <h4>{{ $projects->projectType->project_type ?? '' }}</h4>
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
                            <li>{{ $projects->projectType->project_type ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <div class="data-center-project-main-sec">
        <div class="container">
            <div class="row">
                @php
                    use App\Models\Projects;
                    $completedProjects = Projects::with('projectType')
                        ->where('id', $projects->id)
                        ->where('project_type_id', $projects->project_type_id)
                        ->where('project_status', 1)
                        ->orderBy('id', 'desc')
                        ->whereNull('deleted_at')
                        ->get();

                    $projectsTypes = '';

                    if ($completedProjects->isNotEmpty()) {
                        $statusCounts = $completedProjects->groupBy('project_status')->map->count();

                        if (isset($statusCounts[1])) {
                            $projectsTypes = 'Completed Projects';
                        } elseif (isset($statusCounts[2])) {
                            $projectsTypes = 'Ongoing Projects';
                        } elseif (isset($statusCounts[3])) {
                            $projectsTypes = 'Upcoming Projects';
                        }
                    }
                @endphp

                <div class="col-lg-12">
                    <div class="dcpm-title-sec">
                        <h1>{{ $projectsTypes }}</h1>
                    </div>
                </div>
                @foreach ($completedProjects as $key => $value)
                    <div class="col-lg-4 col-md-6">
                        <!-- Project Item Start -->
                        <div class="data-center-project-item-sec">
                            <!-- Project Image Start -->
                            <div class="data-center-project-image-sec">
                                <a href="{{ route('frontend.project-details', ['project_slug' => $value->slug]) }}">
                                    <figure>
                                        <img src="{{ asset('/j4c_Group/projects/image/' . $value->image) }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Project Image End -->

                            <!-- Project Body Start -->
                            <div class="data-center-project-body-sec">
                                <!-- Project Body Title Start -->
                                <div class="data-center-project-title-sec">
                                    <h3>{{ $value->project_name ?? '' }}</h3>
                                </div>
                                <!-- Project Body Title End -->

                                <!-- Project Content Start -->
                                <div class="data-center-project-content-sec">
                                    <p>{{ $value->project_location ?? '' }}</p>
                                    <div class="data-center-project-content-footer-sec">
                                        <a href="{{ route('frontend.project-details', ['project_slug' => $value->slug]) }}" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Project Content End -->
                            </div>
                            <!-- Project Body End -->
                        </div>
                        <!-- Project Item End -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="data-center-project-main-sec ongoing-project-listing-sec">
        <div class="container">
            <div class="row">
                @php
                    $ongoingProjects = Projects::with('projectType')
                        ->where('project_status', 2)
                        ->orderBy('id', 'desc')
                        ->whereNull('deleted_at')
                        ->get();

                    $projectType = '';
                    if (!empty($projects->project_status == 1)) {
                        $projectType = 'Completed Projects';
                    } elseif (!empty($projects->project_status == 2)) {
                        $projectType = 'Ongoing Projects';
                    } elseif (!empty($projects->project_status == 3)) {
                        $projectType = 'Upcoming Projects';
                    }
                @endphp

                <div class="col-lg-12">
                    <div class="dcpm-title-sec">
                        <h1>{{ $projectType }}</h1>
                    </div>
                </div>

                @foreach ($ongoingProjects as $key => $value)
                    <div class="col-lg-4 col-md-6">
                        <!-- Project Item Start -->
                        <div class="data-center-project-item-sec">
                            <!-- Project Image Start -->
                            <div class="data-center-project-image-sec">
                                <a href="{{ route('frontend.project-details', ['project_slug' => $value->slug]) }}">
                                    <figure>
                                        <img src="{{ asset('/j4c_Group/projects/image/' . $value->image) }}" alt="">
                                    </figure>
                                </a>
                            </div>
                            <!-- Project Image End -->

                            <!-- Project Body Start -->
                            <div class="data-center-project-body-sec">
                                <!-- Project Body Title Start -->
                                <div class="data-center-project-title-sec">
                                    <h3>{{ $value->project_name ?? '' }}</h3>
                                </div>
                                <!-- Project Body Title End -->

                                <!-- Project Content Start -->
                                <div class="data-center-project-content-sec">
                                    <p>{{ $value->project_location ?? '' }}</p>
                                    <div class="data-center-project-content-footer-sec">
                                        <a href="{{ route('frontend.project-details', ['project_slug' => $value->slug]) }}" class="readmore-btn">view more</a>
                                    </div>
                                </div>
                                <!-- Project Content End -->
                            </div>
                            <!-- Project Body End -->
                        </div>
                        <!-- Project Item End -->
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
