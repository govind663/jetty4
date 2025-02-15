@extends('frontend.layouts.master')

@section('title')
    J4C Group | Awards & Certifications
@endsection

@push('styles')
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area" style="background-image:url({{ asset('frontend/assets/images/banner/about_bg.jpg') }})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="breadcumb-content">
                        <div class="breadcumb-title">
                            <h4>Awards & Certifications</h4>
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
                            <li>Awards & Certifications</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <section class="about-certificate-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dcpm-title-sec">
                        <h1>Certifications</h1>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="certificate-box-sec">
                        <a href="{{ asset('frontend/assets/images/certificate/certificate-1.png') }}" data-fancybox="gallery" data-caption="Certificate 1">
                            <img src="{{ asset('frontend/assets/images/certificate/certificate-1.png') }}" alt="Certificate 1">
                        </a>
                        <div class="awards-certifi-content-sec">
                            <h3>ISO 9001 : 2015</h3>
                            <p>Quality Management System</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="certificate-box-sec">
                        <a href="{{ asset('frontend/assets/images/certificate/certificate-2.png') }}" data-fancybox="gallery" data-caption="Certificate 1">
                            <img src="{{ asset('frontend/assets/images/certificate/certificate-2.png') }}" alt="Certificate 2">
                        </a>
                        <div class="awards-certifi-content-sec">
                            <h3>ISO 14001 : 2015</h3>
                            <p>Environmental Management System</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="certificate-box-sec">
                        <a href="{{ asset('frontend/assets/images/certificate/certificate-3.png') }}" data-fancybox="gallery" data-caption="Certificate 1">
                            <img src="{{ asset('frontend/assets/images/certificate/certificate-3.png') }}" alt="Certificate 3">
                        </a>
                        <div class="awards-certifi-content-sec">
                            <h3>ISO 45001 : 2018</h3>
                            <p>Occupational Health and Safety Management System</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="awards-cer-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dcpm-title-sec">
                        <h1>Awards</h1>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-box-sec">
                        <a href="{{ asset('frontend/assets/images/certificate/apex-certi-img.jpg') }}" data-fancybox="gallery" data-caption="Certificate 1">
                            <img src="{{ asset('frontend/assets/images/certificate/apex-certi-img.jpg') }}" alt="Certificate 1">
                        </a>
                        <div class="awards-content-sec">
                            <h3>Gold Awards</h3>
                            <p>9th Apex India Occupational Health & Safety Award 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
