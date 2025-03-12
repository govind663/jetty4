@extends('frontend.layouts.master')

@section('title')
    J4C Group | Contact Us
@endsection

@push('styles')
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area" style="background-image:url({{ asset('/j4c_Group/breadcrumb_image/' . $breadcrumbs->breadcrumb_image) }})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="breadcumb-content">
                        <div class="breadcumb-title">
                            <h4>{{ $breadcrumbs->breadcrumb_title }}</h4>
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
                            <li>{{ $breadcrumbs->breadcrumb_title }}</li>
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
                    <div class="contact-info-box">
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
                    <div class="contact-info-box">
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
                    <div class="contact-info-box two">
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
                    <form method="POST" action="{{ route('frontend.store-contact-form') }}" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Enter Your Name*" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter Your Email*" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="phone" id="phone" maxlength="10" class="form-control @error('phone') is-invalid @enderror"  placeholder="Enter Your Phone*" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror"  placeholder="Subject*" value="{{ old('subject') }}">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-input-box">
                                    <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"  placeholder="Write Message">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
