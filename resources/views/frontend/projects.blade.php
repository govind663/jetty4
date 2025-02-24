@extends('frontend.layouts.master')

@section('title')
    J4C Group | {{ $projectsTypeName ?? '' }}
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
                            <h4>{{ $projectsTypeName ?? '' }}</h4>
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
                            <li>{{ $projectsTypeName ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    @php
        use App\Models\Projects;
        $completedProjects = Projects::with('projectType')
            ->where('project_type_id', $projectTypeId)
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

    @if(!empty($completedProjects) && $completedProjects->count() > 0)
    <div class="data-center-project-main-sec">
        <div class="container">
            <div class="row">            
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
    @endif


    @php
        $ongoingProjects = Projects::with('projectType')
            ->where('project_type_id', $projectTypeId)
            ->where('project_status', 2)
            ->orderBy('id', 'desc')
            ->whereNull('deleted_at')
            ->get();

        $projectType = '';

        if ($ongoingProjects->isNotEmpty()) {
            $statusCounts = $ongoingProjects->groupBy('project_status')->map->count();

            if (isset($statusCounts[1])) {
                $projectType = 'Completed Projects';
            } elseif (isset($statusCounts[2])) {
                $projectType = 'Ongoing Projects';
            } elseif (isset($statusCounts[3])) {
                $projectType = 'Upcoming Projects';
            }
        }
    @endphp

    @if(!empty($ongoingProjects) && $ongoingProjects->count() > 0)
    <div class="data-center-project-main-sec ongoing-project-listing-sec">
        <div class="container">
            <div class="row">                
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
    @endif
@endsection

@push('scripts')
@endpush
