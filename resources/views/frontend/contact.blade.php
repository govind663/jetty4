@extends('frontend.layouts.master')

@section('title')
    J4C Group | Contact Us
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
                            <h4>Contact Us</h4>
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
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->
    <section class="bg-grey-sec"></section>

    <div class="contact-area">
        <div class="container">
            <div class="row contact-info-bg">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-info-box" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                        <div class="contact-info-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Address</h4>
                            <p class="text-justify">
                                Jett 4 Construction Private Limited<br>
                                {{ $contactDetails->company_address }}<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-info-box" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                        <div class="contact-info-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Make A Call</h4>
                            <p><a href="tel:{{ $contactDetails->company_mobile_no }}">{{ $contactDetails->company_mobile_no }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-info-box two" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <div class="contact-info-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Email Address</h4>
                            <p><a href="mailto:{{ $contactDetails->company_email }}">{{ $contactDetails->company_email }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pagla-shahin align-items-center">
                <div class="col-lg-6">
                    <div class="google-map" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <iframe
                            src="{{ $contactDetails->location_map_iframe_link }}"
                            width="100%" height="470" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title left" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <h1>Connect With Our Team</h1>
                    </div>
                    <form action="#" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="name" placeholder="Enter Your Name*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="Email" placeholder="Enter Your Email*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="Phone" placeholder="Phone Number*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="Subject" placeholder="Subject*" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-input-box">
                                    <textarea name="Massage" placeholder="Write Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="button" id="button-2">
                                    <div id="slide"></div>
                                    <a href="#">Submit</a>
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
