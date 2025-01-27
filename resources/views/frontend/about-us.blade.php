@extends('frontend.layouts.master')

@section('title')
    J4C Group | About Us
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
                            <h4>About Us</h4>
                        </div>
                        <!--<ul>-->
                        <!--  <li><a href="index.html">Home</a></li>-->
                        <!--  <li>About Us</li>-->
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
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->
    <section class="bg-grey-sec"></section>

    <section class="about-vision-mission-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-vision-mission-title-sec">
                        <h1>Our Mission and Vision</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="mission-bg-sec about-vision-mission-content-sec">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/icons/mission.png') }}" alt="Mission Icon">
                        </div>
                        <h4 class="title pt-3">Mission</h4>
                        <p class="text-justify">At Jett 4 Construction, our mission is to provide the highest quality construction services to
                            our
                            clients by leveraging our expertise and experience. We are committed to delivering excellence in
                            all
                            aspects of our work, from project management to execution, while ensuring that we maintain the
                            highest
                            standards of professionalism, integrity, and ethical conduct. Our goal is to build long term
                            relationships
                            with our clients, based on trust, mutual respect, and a shared passion for excellence.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="vision-bg-sec about-vision-mission-content-sec">
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/icons/vision.png') }}" alt="Vision Icon">
                        </div>
                        <h4 class="title pt-3">Vision</h4>
                        <p class="text-justify">Jett 4 Construction aims to be India's most trusted name in construction industry. We strive for
                            excellence through innovative and efficient processes, ensuring quality, integrity, and
                            professionalism.
                            By exceeding our clients' expectations, investing in our people and fostering a culture of
                            collaboration,
                            we aspire to become the industry leader. Our goal is to be a company that is respected by
                            clients,
                            partners, and employees, and we will maintain our reputation for excellence by providing
                            unparalleled
                            service. With our values guiding us, we will establish ourselves as the go-to construction
                            company for
                            data centers in India.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-certificate-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-certificate-title-sec">
                        <h1>CERTIFICATION</h1>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-sm-6">
                    <div class="certificate-box-sec">
                        <img src="{{ asset('frontend/assets/images/certificate/certificate-1.png') }}" alt="Certificate 1">
                        <div class="box-content">
                            <div class="inner-content">
                                <ul class="icon">
                                    <li>
                                        <a href="{{ asset('frontend/assets/images/certificate/certificate-1.png') }}" data-fancybox="certificate-gallery">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="certificate-box-sec">
                        <img src="{{ asset('frontend/assets/images/certificate/certificate-2.png') }}" alt="Certificate 1">
                        <div class="box-content">
                            <div class="inner-content">
                                <ul class="icon">
                                    <li>
                                        <a href="{{ asset('frontend/assets/images/certificate/certificate-2.png') }}" data-fancybox="certificate-gallery">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="certificate-box-sec">
                        <img src="{{ asset('frontend/assets/images/certificate/certificate-3.png') }}" alt="Certificate 1">
                        <div class="box-content">
                            <div class="inner-content">
                                <ul class="icon">
                                    <li>
                                        <a href="{{ asset('frontend/assets/images/certificate/certificate-3.png') }}" data-fancybox="certificate-gallery">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
