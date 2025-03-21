@extends('frontend.layouts.master')

@section('title')
    J4C Group | {{ $media_events_details->mediaEvents?->title ?? '' }}
@endsection

@push('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Lightbox CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">

<style>
    .photo-gallery-box-sec img {
        width: 100%;
        height: 300px !important;
    }
</style>
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area" style="background-image: url({{ asset('frontend/assets/images/banner/about_bg.jpg') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="breadcumb-content">
                        <div class="breadcumb-title">
                            <h4>Media & Events</h4>
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
                            <li><a href="{{ route('frontend.media-events') }}">Media & Events</a></li>
                            <li>{{ $media_events_details->mediaEvents?->title ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    {{-- Event Details --}}
    <div class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-thumb">
                        <img src="{{ asset('/j4c_Group/media_events_details/image/' . $media_events_details->image) }}"
                            alt="">
                    </div>
                    <div class="blog-details-content">
                        <h1 class="blog-details-title">{{ $media_events_details->mediaEvents?->title ?? '' }}</h1>
                        {!! $media_events_details->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Event gallery slider --}}
    <div class="blog-gallery-slider-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper blog-gallery-slider">
                        <div class="swiper-wrapper">
                            @foreach ($media_events_details->event_gallery_images as $gallery)
                                <div class="swiper-slide">
                                    <div class="photo-gallery-box-sec">
                                        <img src="{{ asset('/j4c_Group/media_events_details/event_gallery_images/' . $gallery) }}"
                                            alt="Gallery Image">
                                        <div class="photo-gallery-box-content-sec">
                                            <div class="inner-content">
                                                <ul class="icon">
                                                    <li>
                                                        <a href="{{ asset('/j4c_Group/media_events_details/event_gallery_images/' . $gallery) }}"
                                                            data-lightbox="gallery" data-title="Gallery Image">
                                                            <i class="fa fa-search-plus"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script>
        var swiper = new Swiper(".blog-gallery-slider", {
            slidesPerView: 3, // Default to 3 slides
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
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                },
                1280: {
                    slidesPerView: 3
                }
            }
        });
    </script>
@endpush
