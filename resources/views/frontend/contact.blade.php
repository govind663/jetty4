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
                        <!--<ul>-->
                        <!--  <li><a href="index.html">Home</a></li>-->
                        <!--  <li>Contact Us</li>-->
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
                                <b>Jett 4 Construction Private Limited</b><br>
                                1109, Lodha Supremus, Opposite MTNL Office,
                                Sakivihar Road, Near Tunga Village, Chandivali, 
                                Powai, Mumbai - 400 072.
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
                            <p><a href="tel:02249710456">+022-4971-0456</a></p>
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
                            <p><a href="mailto:info@jett4.com">info@jett4.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pagla-shahin align-items-center">
                <div class="col-lg-6">
                    <div class="google-map" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15079.022016773708!2d72.890529!3d19.118379!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c80f04f37535%3A0x5c19f51fed6e597!2sLodha%20Supremus%2C%20Saki%20Vihar%20Rd%2C%20Opposite%20Mtnl%20Off%2C%20Tunga%20Village%2C%20Chandivali%2C%20Powai%2C%20Mumbai%2C%20Maharashtra%20400072!5e0!3m2!1sen!2sin!4v1732186829977!5m2!1sen!2sin"
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
