@extends('frontend.layouts.master')

@section('title')
    J4C Group | Under Construction
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
                            <h4>Under Construction</h4>
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
                            <li>Under Construction</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <div class="under-const-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="under-const-content-sec">
                        <img src="{{ asset('frontend/assets/images/under-const-img.png') }}" alt="">
                        <h1>Page Under Construction</h1>
                        <p>This page is currently being worked on. Please check back soon!</p>
                        <div class="button" id="button-2">
                            <div id="slide"></div>
                            <a href="{{ route('frontend.home') }}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
