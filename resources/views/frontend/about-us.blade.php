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

    <section class="about_page_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_page_text">
                        <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                            <h1>Welcome to J4C</h1>
                        </div>
                        <p data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                            J4C is a leading organisation with a core team that brings over 15 years of experience in
                            the construction industry. We specialise in developing high-functioning buildings, including
                            data centers, commercial IT parks, and other specialised structures. We provide innovative
                            solutions and top-tier services to our clients. Our team of seasoned professionals consistently
                            exceeds industry standards, ensuring customer satisfaction and robust operational support.
                            With our extensive expertise, we have undertaken numerous projects and achieved success,
                            earning a reputation for reliability and excellence in the industry.
                        </p>
                        <p>
                            Our steadfast reputation for professionalism, integrity, and excellence is supported by a proven
                            track record of consistently delivering outstanding results. With our extensive expertise in
                            mobilization of resources including arrangement of dedicated labor force, we are well-equipped to
                            manage large, complex projects across various industry sectors. Our approach is defined by an
                            unwavering commitment to quality, innovation, and punctual delivery, ensuring that our clients’
                            expectations are met and surpassed. This dedication has allowed us to forge lasting relationships
                            and achieve consistency in performance with repeat business.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="testi-shape">
            <img src="{{ asset('frontend/assets/images/shape/testi-shape.png')  }}" alt="">
        </div>
    </section>
    <section class="process-area who_we_are_sec">
        <div class="container">
            <div class="row align-items-center" id="poress-row">
                <div class="col-lg-6 col-md-12">
                    <div class="porcess-thumb" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/who-we-are.jpg')  }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="process-left" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title left">
                            <h1>Who We Are </h1>
                        </div>
                        <p>
                            J4C is recognized for its reliability and innovation in construction, consistently
                            delivering projects that fulfill stringent quality standards. Our capabilities span
                            multiple industry sectors, enabling us to tackle large and complex projects with ease.
                            This depth of expertise is enhanced by our ability to leverage vast resources, including
                            our dedicated in-house team and an extensive labor force that can adapt to varying
                            project requirements.
                        </p>
                        <p>
                            Our commitment goes beyond just building structures—we prioritize quality, innovation,
                            and timely delivery, ensuring that our clients are fully satisfied with every project.
                            It is this relentless focus on quality and customer satisfaction that has helped us forge
                            long-lasting client relationships and secure a high rate of repeat business.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
