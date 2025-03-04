@extends('frontend.layouts.master')

@section('title')
    J4C Group | Awards & Certifications
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

    <section class="about-certificate-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dcpm-title-sec">
                        <h1>Certifications</h1>
                    </div>
                </div>
                @foreach($certifications as $key => $value)
                <div class="col-md-3 col-sm-6">
                    <div class="certificate-box-sec">
                        <a href="{{ asset('/j4c_Group/certification/image/' . $value->image) }}" data-fancybox="gallery" data-caption="{{ $value->title }}">
                            <img src="{{ asset('/j4c_Group/certification/image/' . $value->image) }}" alt="{{ $value->title }}">
                        </a>
                        <div class="awards-certifi-content-sec">
                            <h3>{{ $value->title }}</h3>
                            <p>{!! $value->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
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
                @foreach($awards as $key => $value)
                <div class="col-md-3 col-sm-6">
                    <div class="awards-box-sec">
                        <a href="{{ asset('/j4c_Group/award/image/' . $value->image) }}" data-fancybox="gallery" data-caption="{{ $value->title }}">
                            <img src="{{ asset('/j4c_Group/award/image/' . $value->image) }}" alt="{{ $value->title }}">
                        </a>
                        <div class="awards-content-sec">
                            <h3>{{ $value->title }}</h3>
                            <p>{!! $value->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
