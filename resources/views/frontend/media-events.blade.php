@extends('frontend.layouts.master')

@section('title')
    J4C Group | Media & Events
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

    <div class="blog-grid-area">
        <div class="container">

            <div class="row">
                @foreach ($media_events as $key => $value)
                    <div class="col-lg-4 col-md-4">
                        <div class="single-blog-box">
                            <div class="single-blog-thumb">
                                <img src="{{ asset('/j4c_Group/media-events/image/' . $value->image) }}" alt="">
                            </div>
                            <div class="blog-content">
                                <div class="blog-date-sec">
                                    <ul>
                                        <li><img src="{{ asset('frontend/assets/images/icons/date-icon.png') }}" alt="Date Icon">{{ $value->event_date }}</li>
                                        <li><img src="{{ asset('frontend/assets/images/icons/location-icon.png') }}" alt="Location Icon">{{ $value->event_location }}</li>
                                    </ul>
                                </div>
                                <a href="{{ route('frontend.media-events-details', $value->slug) }}">{{ $value->title }}</a>
                                <P>{!! $value->description !!}</P>
                                <div class="blog-service-button-sec">
                                    <a href="{{ route('frontend.media-events-details', $value->slug) }}" class="blog-service-btn">
                                        Read More
                                        <img src="{{ asset('frontend/assets/images/icons/up-right-arrow.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
