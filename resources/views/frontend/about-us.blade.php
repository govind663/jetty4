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

    <section class="about_page_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_page_text">
                        <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                            <h1>{{ $aboutj4c->title }}</h1>
                        </div>
                        <p data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                            {!! $aboutj4c->description !!}
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
                        <img src="{{ asset('/j4c_Group/who-we-are/image/' . $whoweare->image)  }}" alt="{{ $whoweare->image }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="process-left" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title left">
                            <h1>{{ $whoweare->title }}</h1>
                        </div>
                        <p>
                           {!!  $whoweare->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
