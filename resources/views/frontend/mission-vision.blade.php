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
                            <img src="{{ asset('frontend/assets/images/mission-img-1.jpg') }}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="mission-text-area">
                        <div class="mission-img-sec">
                            <img src="{{ asset('frontend/assets/images/icons/targeting.png') }}" alt="Mission">
                        </div>
                        <div class="section-title">
                            <h2>Our Mission</h2>
                        </div>
                        <p>
                            At J4C, our mission is to provide the highest quality construction services to our clients by
                            leveraging our expertise and experience. We are committed to delivering excellence in all
                            aspects of our work, from project management to execution, while ensuring that we maintain
                            the highest standards of professionalism, integrity, and ethical conduct. Our goal is to
                            build long term relationships with our clients, based on trust, mutual respect, and a shared
                            passion for excellence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="our-vision-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="call-action vision-content-sec">
                        <div class="vision-img-sec">
                            <img src="{{ asset('frontend/assets/images/icons/our-vision-icon.png') }}" alt="vision">
                        </div>
                        <div class="vision-title-sec">
                            <h2>Our Vision</h2>
                        </div>
                        <p>
                            J4C aims to be India's most trusted name in construction industry. We strive for
                            excellence through innovative and efficient processes, ensuring quality, integrity, and
                            professionalism. By exceeding our clients' expectations, investing in our people and
                            fostering a culture of collaboration, we aspire to become the industry leader. Our goal
                            is to be a company that is respected by clients, partners, and employees, and we will
                            maintain our reputation for excellence by providing unparalleled service. With our
                            values guiding us, we will establish ourselves as the go-to construction company for
                            data centers in India.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
