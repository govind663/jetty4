@extends('frontend.layouts.master')

@section('title')
    J4C Group | Sustainability
@endsection

@push('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<style>

</style>
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

    <section class="sustainability_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="sustainability_img" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="{{ asset('/j4c_Group/about_sustainability/image/' . $aboutSustainability->image) }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="sustainability_content">
                        <p>{!! $aboutSustainability->description !!}</p>

                        <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                            <h1>{{ $aboutSustainability->title }}</h1>
                        </div>
                        <div class="row">
                            @foreach ($aboutSustainability->pillers_title as $key => $pillers_title)
                                <div class="col-md-6">
                                    <div class="key_pillar" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
                                        <h5>
                                            <span>0{{ $key + 1 }}</span>
                                            {{ $pillers_title }}
                                        </h5>
                                        <p>{{ $aboutSustainability->pillers_description[$key] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p>{!! $aboutSustainability->other_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sustainability_sec_one">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $safetycommitment->title }}</h1>
                        <p>{!! $safetycommitment->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-area residential-main-page-sec">
        <div class="container">
            <div class="section-title sus-title-sec" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                <h1>Our Safety Initiatives</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper our-safety-initiatives-slider">
                        <div class="swiper-wrapper">
                            @foreach ($safetyinitiatives as $key => $value)
                                <div class="swiper-slide">
                                    <div class="res-single-services">
                                        <img src="{{ asset('/j4c_Group/safety_initiatives/image/' . $value->image) }}" alt="Image" class="img-responsive">
                                        <div class="services-content">
                                            <h3>{{ $value->title }}</h3>
                                            <p>{{ $value->description ?? '' }}</p>
                                            <span>
                                                <img src="{{ asset('/j4c_Group/safety_initiatives/icon/' . $value->icon) }}" alt="Image" class="img-responsive">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Navigation Buttons -->
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".our-safety-initiatives-slider", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
                1280: { slidesPerView: 3 }
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
            once: true, // Ensures animation runs once
            duration: 1000,
        });
    });
</script>
@endpush
