@extends('frontend.layouts.master')

@section('title')
    J4C Group | Our USP
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

    <section class="j4c_usp_sec home-three">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $ourUsps->title }}</h1>
                        {!! $ourUsps->description !!}
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="j4c_usp_slider owl-carousel">
                        @foreach ($ourUsps->baner_image as $key => $image)
                            <div class="item">
                                <div class="single-service-box our-usp-ser-box our-usp-sub-sec-1"
                                    style="background-image: url({{ asset('j4c_Group/our_usp/banner_image/' . $image) }});">
                                    <div class="services-icon-thumb">
                                        <img src="{{ asset('j4c_Group/our_usp/banner_icon/' . $ourUsps->banner_icon[$key]) }}" alt="">
                                    </div>
                                    <div class="services-content">
                                        <h4>{{ $ourUsps->banner_title[$key] }}</h4>
                                        <p>{{ $ourUsps->banner_description[$key] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="unique_approach_sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="section-title left">
                        <h1>{{ $uniqueApproaches->title }}</h1>
                        {!! $uniqueApproaches->description !!}
                    </div>
                    <div class="faqs-container">
                        @foreach ($uniqueApproaches->service_name as $key => $service_name)
                            <div class="faq-singular {{ $key == 0 ? 'active' : '' }}">
                                <h2 class="faq-question">{{ $service_name }}</h2>
                                <div class="faq-answer" style="{{ $key == 0 ? 'display: block;' : 'display: none;' }}">
                                    <div itemprop="text">{{ $uniqueApproaches->service_description[$key] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="faqs-thumb">
                        <img src="{{ asset('/j4c_Group/unique-approaches/image/' . $uniqueApproaches->image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="event-area qmkpi-sec" style="background-image: url({{ asset('/j4c_Group/our-managements/image/' . $ourManagements->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title center">
                        <h1>{{ $ourManagements->title }}</h1>
                        {!! $ourManagements->description !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="fast-day" role="tabpanel" aria-labelledby="fast-day-tab"
                            tabindex="0">
                            <div class="row">
                                @foreach ($ourManagements->quality_icon as $key => $quality_icon)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb qmkpi-img-sec">
                                                <img src="{{ asset('/j4c_Group/our-managements/quality_icon/' . $quality_icon) }}" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <h4>{{ $ourManagements->quality_title[$key] }}</h4>
                                                </div>
                                            </div>
                                            <div class="event-icon">
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                {!! $ourManagements->quality_description[$key] !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
