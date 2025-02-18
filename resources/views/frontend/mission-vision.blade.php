@extends('frontend.layouts.master')

@section('title')
    J4C Group | Mission & Vision
@endsection

@push('styles')
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area" style="background-image:url(frontend/assets/images/banner/about_bg.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="breadcumb-content">
                        <div class="breadcumb-title">
                            <h4>Mission & Vision</h4>
                        </div>
                        <!--<ul>-->
                        <!--  <li><a href="./">Home</a></li>-->
                        <!--  <li>About J4C</li>-->
                        <!--</ul>-->
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
                            <li>Mission & Vision</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <!-- Mission Section -->
    <div class="mission-main-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="mission-img-area">
                        <div class="mission-img-1">
                            <img src="{{ asset('/j4c_Group/our-mission/image/' . $ourmission->image) }}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="mission-text-area">
                        <div class="mission-img-sec">
                            <img src="{{ asset('/j4c_Group/our-mission/icon/' . $ourmission->icon) }}" alt="Mission">
                        </div>
                        <div class="section-title">
                            <h2>{{ $ourmission->title }}</h2>
                        </div>
                        <p>
                            {!! $ourmission->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="our-vision-sec" style="background-image:url({{ asset('/j4c_Group/our-vision/image/' . $ourvision->image) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="call-action vision-content-sec">
                        <div class="vision-img-sec">
                            <img src="{{ asset('/j4c_Group/our-vision/icon/' . $ourvision->icon) }}" alt="Vision">
                        </div>
                        <div class="vision-title-sec">
                            <h2>{{ $ourvision->title }}</h2>
                        </div>
                        <p>
                            {!! $ourvision->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
