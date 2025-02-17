@extends('frontend.layouts.master')

@section('title')
    J4C Group | Careers
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
                            <h4>Careers</h4>
                        </div>
                        <!--<ul>-->
                        <!--  <li><a href="index.html">Home</a></li>-->
                        <!--  <li>Careers</li>-->
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
                            <li>Careers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <section class="careers_sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="careers_img" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/careers/career-img.jpg') }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="careers_text" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title">
                            <h1>Join a Legacy of Innovation and Excellence</h1>
                        </div>
                        <p>At J4C, we are more than builders. We are innovators, leaders, and collaborators, driving excellence in constructing commercial and residential spaces & data centers. With an unwavering commitment to quality and sustainability, our projects redefine industry standards and set new benchmarks globally.</p>
                        <p>As a member of the Jett 4 team, you’ll work alongside a diverse, skilled workforce on some of the most impactful projects in the field, where every role plays a part in creating meaningful spaces and solutions for communities around the world. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="openings_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>Current Openings </h1>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="job-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h3>Project Managers </h3>
                        <p><i class="fa fa-map-marker"></i> <b>Location</b> - Mumbai, Thane | <i class="fa fa-money"
                                aria-hidden="true"></i> <b>Salary</b> - 50k-60k</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="button" id="button-2" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div id="slide"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                    </div>
                </div>
            </div>
            <hr class="hr-blue">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="job-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h3>Field Engineers</h3>
                        <p><i class="fa fa-map-marker"></i> <b>Location</b> - Mumbai, Thane | <i class="fa fa-money"
                                aria-hidden="true"></i> <b>Salary</b> - 20k-30k</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="button" id="button-2" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div id="slide"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                    </div>
                </div>
            </div>
            <hr class="hr-blue">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="job-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h3>Junior Site Civil Supervisors</h3>
                        <p><i class="fa fa-map-marker"></i> <b>Location</b> - Mumbai, Thane | <i class="fa fa-money"
                                aria-hidden="true"></i> <b>Salary</b> - 70k-80k</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="button" id="button-2" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div id="slide"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                    </div>
                </div>
            </div>
            <hr class="hr-blue">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="job-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h3>Quality Supervisors</h3>
                        <p><i class="fa fa-map-marker"></i> <b>Location</b> - Mumbai, Thane | <i class="fa fa-money"
                                aria-hidden="true"></i> <b>Salary</b> - 50k-70k</p>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="button" id="button-2" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div id="slide"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="careers-wrap-one"
        style="background-image:url('{{ asset('frontend/assets/images/careers/career-img-bg.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="career-title-one" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
                        <h3>Ready to Elevate Your Career<span>?</span></h3>
                        <h5>We’re looking for talented individuals who are driven, detail-oriented, and passionate about
                            creating quality solutions.</h5>
                        <p>Fill out the form or share your resume at <a href="#">hr@j4cgroup.com</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Structure -->
    <div class="modal fade careeers-pop-sec" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header crs-tle-sec">
                    <h5 class="modal-title crs-tle-sub-sec" id="applyModalLabel">Apply Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-box crs-input-box-sec">
                                    <input type="text" name="name" placeholder="Your Name*" pattern="[A-Za-z\s]+"
                                        title="Please enter alphabetic characters only." required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box crs-input-box-sec">
                                    <input type="text" name="Email" placeholder="Your Email*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box crs-input-box-sec">
                                    <input type="text" name="Phone" placeholder="Phone Number*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box crs-input-box-sec">
                                    <input type="text" name="Subject" placeholder="Subject*" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-input-box crs-input-box-sec">
                                    <input type="text" name="Position Applying For"
                                        placeholder="Position Applying For*" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-input-box crs-input-box-sec">
                                    <textarea name="Massage" placeholder="Write Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <div class="button" id="button-2">
                                        <div id="slide"></div>
                                        <a href="#">Submit</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
