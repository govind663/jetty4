@extends('frontend.layouts.master')

@section('title')
J4C Group | Home
@endsection

@push('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .brand-area .section-title p {
        /* text-align: center; */
        margin-bottom: 0px !important;
    }
    .associate-area .section-title.left {
        margin-bottom: 0px;
    }
</style>
@endpush

@section('content')

    {{-- Hero Area --}}
    <div id="carouselExampleCaptions" class="main_slider carousel slide">
        <div class="carousel-indicators">
            @foreach ($banners as $index => $banner)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($banners as $index => $banner)
                @if ($banner->banner_name == 'Banner1')
                    <div class="carousel-item hero-area {{ $index == 0 ? 'active' : '' }}">

                        @if ($banner->banner_image)
                            <img src="{{ asset('/j4c_Group/banner/banner_image/' . $banner->banner_image) }}" class="d-block w-100" alt="Banner Image" loading="lazy">
                        @elseif ($banner->banner_video)
                            <video width="100%" class="elVideo" loop autoplay playsinline muted>
                                <source src="{{ asset('/j4c_Group/banner/banner_video/' . $banner->banner_video) }}" type="video/mp4">
                            </video>
                        @endif

                        <div class="carousel-caption d-none d-md-block">
                            <h5>{!! $banner->title !!}</h5>
                        </div>
                    </div>
                @elseif ($banner->banner_name == 'Banner2')
                    <div class="carousel-item hero-area {{ $index == 0 ? 'active' : '' }}">

                        @if ($banner->banner_image)
                            <img src="{{ asset('/j4c_Group/banner/banner_image/' . $banner->banner_image) }}" class="d-block w-100" alt="Banner Image" loading="lazy">
                        @elseif ($banner->banner_video)
                            <video width="100%" class="elVideo" loop autoplay playsinline muted>
                                <source src="{{ asset('/j4c_Group/banner/banner_video/' . $banner->banner_video) }}" type="video/mp4">
                            </video>
                        @endif

                        <div class="carousel-caption d-none d-md-block">
                            <h5>{!! $banner->title !!}</h5>
                        </div>
                    </div>
                @elseif ($banner->banner_name == 'Banner3')
                    <div class="carousel-item hero-area {{ $index == 0 ? 'active' : '' }}">

                        @if ($banner->banner_image)
                            <img src="{{ asset('/j4c_Group/banner/banner_image/' . $banner->banner_image) }}" class="d-block w-100" alt="Banner Image" loading="lazy">
                        @elseif ($banner->banner_video)
                            <video width="100%" class="elVideo" loop autoplay playsinline muted>
                                <source src="{{ asset('/j4c_Group/banner/banner_video/' . $banner->banner_video) }}" type="video/mp4">
                            </video>
                        @endif

                        <div class="carousel-caption d-none d-md-block">
                            <h5>{!! $banner->title !!}</h5>
                        </div>
                    </div>
                @elseif ($banner->banner_name == 'Banner4')
                    <div class="carousel-item hero-area {{ $index == 0 ? 'active' : '' }}">

                        @if ($banner->banner_image)
                            <img src="{{ asset('/j4c_Group/banner/banner_image/' . $banner->banner_image) }}" class="d-block w-100" alt="Banner Image" loading="lazy">
                        @elseif ($banner->banner_video)
                            <video width="100%" class="elVideo" loop autoplay playsinline muted>
                                <source src="{{ asset('/j4c_Group/banner/banner_video/' . $banner->banner_video) }}" type="video/mp4">
                            </video>
                        @endif

                        <div class="carousel-caption d-none d-md-block">
                            <h5>{!! $banner->title !!}</h5>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Statistics --}}
    <section class="echofy-text-section" data-cues="zoomIn">
        <div class="inner-container">
            <div class="marquee">
                <div class="marquee-block">
                    @foreach ($statistics as $value)
                        <div class="content-box">
                            <h6 class="title">
                                <span>{{ $value->description }}</span>
                                {{ $value->title }}
                            </h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- About Area --}}
    <div class="about-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-thumb" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="{{ asset('/j4c_Group/about-us/image/' . $aboutj4c->image) }}" width="546" height="478" alt="About us image">
                        <img class="about-thumb-shape" src="frontend/assets/images/shape/about-sahpe.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title left">
                            <!--  <h4>About J4C</h4> -->
                            <h1>{{ $aboutj4c->title }}</h1>
                        </div>
                        {!! Str::limit($aboutj4c->description, 620) !!}
                        <div class="button" id="button-2">
                            <div id="slide"></div>
                            <a href="{{ route('frontend.about-us') }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Construction Solutions Area --}}
    <div class="datacenter-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="datacenter-img">
                        <img src="{{ asset('/j4c_Group/construction-solutions/image/' . $constructionSolutions->image) }}" width="451" height="455" class="img-responsive" alt="{{ $constructionSolutions->image }}">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="section-title left" data-aos="fade-down" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $constructionSolutions->title }}</h1>
                    </div>
                    <div class="faqs-container" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
                        @foreach($solutions as $index => $solution)
                            <div class="faq-singular">
                                <h2 class="faq-question">&#x27A4; {{ $solution }}</h2>
                                <div class="faq-answer">
                                    <div class="desc">{{ $descriptions[$index] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-area completed-project-area">
        <div class="container">
            <div class="row ongoing_project completed_project">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="project-list-1 owl-carousel">
                            @foreach ($completedProjects as $project)
                                <div class="col-lg-12 single-project">
                                    <div class="project_img">
                                        <img src="{{ asset('/j4c_Group/projects/image/' . $project->image) }}" alt="{{ $project->image }}" width="358"
                                            height="361" loading="lazy">
                                        <div class="project_text">
                                            <h4>{{ $project->projectType->project_type ?? '' }}</h4>
                                            <h3>{{ $project->project_name ?? '' }}</h3>
                                            <p><i class="fa fa-map-marker"></i> {{ $project->project_location ?? '' }}</p>
                                            <a href="{{ route('frontend.project-details', ['project_slug' => $project->slug]) }}"><span>&#x2197;</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="section-title" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $projectsStatus }}</h1>
                        @foreach ($projectStatusDetails as $value)
                            @if($value->id == '1')
                                {!! $value->description !!}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-area ongoing-project-area">
        <div class="container">
            <div class="row ongoing_project">
                <div class=" col-lg-4 col-md-6">
                    <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $ongoingProjectsStatus }}</h1>
                        @foreach ($projectStatusDetails as $key => $value)
                            @if($value->id == '2')
                            {!! $value->description !!}
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="project-list-1 owl-carousel">
                            @foreach ($ongoingProjects as $project)
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="{{ asset('/j4c_Group/projects/image/' . $project->image) }}" alt="{{ $project->project_name }}"
                                        width="358" height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>{{ $project->projectType->project_type ?? '' }}</h4>
                                        <h3>{{ $project->project_name ?? '' }}</h3>
                                        <p><i class="fa fa-map-marker"></i> {{ $project->project_location ?? '' }}</p>
                                        <a href="{{ route('frontend.project-details', ['project_slug' => $project->slug]) }}"><span>&#x2197;</span></a>
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

    {{-- Our Team  --}}
    <div class="why-choose-area home-seven" style="background-image: url('{{ asset('/j4c_Group/teams/image/' . $teams->image) }}');">
        <div class="container">
            <div class="stroke stroke-about lh-base fw-bold position-absolute z-0">Team</div>
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-2 no-padding">
                    <div class="our-team-img">
                        <!-- <img src="frontend/assets/images/our-team.jpg" class="img-responsive"> -->
                    </div>
                </div>
                <div class="col-lg-5 col-md-10 no-padding">
                    <div class="our-team-text" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title">
                            <h1>{{ $teams->title }}</h1>
                        </div>
                        {!! $teams->description !!}
                        <div class="button" id="button-2">
                            <div id="slide"></div>
                            <a href="{{ route('frontend.careers') }}">Join Our Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-shape">
            {{-- <img src="assets/frontend/assets/images/home7/hero-shape.png" alt=""> --}}
        </div>
    </div>

    <!-- Our Clients -->
    <div class="brand-area">
        <div class="container">
            <div class="row"  style="margin-bottom: 20px !important;">
                <div class="col-md-12">
                    <div class="section-title text-left" data-aos="fade-down" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $clients->title }}</h1>
                        <p style="text-align: center;">{!! $clients->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        @foreach($clientsImages as $client)
                            <div class="swiper-slide single-brand-box">
                                <img class="d-inline-block" src="{{ asset('/j4c_Group/clients/image/' . $client) }}" alt="{{ $client }}" width="200" height="100" loading="lazy" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Associates -->
    <div class="associate-area">
        <div class="container">
            <div class="row" style="margin-bottom: 20px !important;">
                <div class="col-lg-9 col-md-12">
                    <div class="section-title left" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $associate->title }}</h1>
                        <p class="associate-para-area">{!! $associate->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 asso-desk-sec">
                    <div class="button" id="button-2" data-bs-toggle="modal" data-bs-target="#associateModal">
                        <div id="slide"></div>
                        <a href="javascript:void(0)">Become Our Associate</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper associate-slider">
                    <div class="swiper-wrapper">
                        @foreach($associateImages as $as)
                            <div class="swiper-slide single-brand-box">
                                <img class="d-inline-block" src="{{ asset('/j4c_Group/associates/image/' . $as) }}" alt="{{ $as }}" width="200" height="100" loading="lazy" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade associ-modal-sec" id="associateModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header assco-header-sec">
                    <h5 class="modal-title assco-title-sec" id="modalLabel">Become Our Associate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                        <div class="col-md-6">
                            <div class="assci-input-box">
                                <input type="text" class="form-control" id="name" required placeholder="Your Name*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="assci-input-box">
                                <input type="tel" class="form-control" id="number" required placeholder="Phone Number*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="assci-input-box">
                                <input type="email" class="form-control" id="email" required placeholder="Your Email*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="assci-input-box">
                                <input type="text" class="form-control" id="location" required placeholder="Your Location">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="assci-input-box">
                                <textarea class="form-control" id="message" rows="3" required placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <div class="button" id="button-2">
                                    <div id="slide"></div>
                                    <a href="#">Submit</a>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    $(document).ready(function() {
        let projectList = $(".project-list-1");
        let projects = $(".project-list-1 > .col-lg-12");

        if (projects.length === 1) {
            // If only one project exists, remove Owl Carousel and show it centered
            projectList.removeClass("owl-carousel owl-loaded");
            projectList.addClass("single-project-display"); // Add a custom class for styling
            projectList.html(projects[0].outerHTML);
        } else {
            // Initialize Owl Carousel only if more than one project exists
            projectList.owlCarousel({
                loop: projects.length > 1, // Loop only if more than 1 project
                autoplay: true
                , autoplayTimeout: 5000
                , dots: false
                , nav: true
                , navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
                , responsive: {
                    0: {
                        items: 1
                    }
                    , 400: {
                        items: 1
                    }
                    , 600: {
                        items: 2
                    }
                    , 768: {
                        items: 1
                    }
                    , 992: {
                        items: 2
                    }
                    , 1000: {
                        items: 2
                    }
                    , 1920: {
                        items: 2
                    }
                }
            });
        }
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const marquee = document.querySelector(".echofy-text-section .marquee");
        const marqueeBlock = document.querySelector(".echofy-text-section .marquee-block");

        // Get the width of the original marqueeBlock
        const blockWidth = marqueeBlock.offsetWidth;

        // Clone the marqueeBlock to create a seamless effect
        const clone = marqueeBlock.cloneNode(true);
        marquee.appendChild(clone);

        // Apply proper width to the marquee container to avoid gaps
        // marquee.style.width = `${blockWidth * 2}px`; // Ensure both blocks fit in one cycle
    });

</script>

<script>
    var swiper = new Swiper(".brand-slider", {
        slidesPerView: 3
        , spaceBetween: 20
        , loop: true
        , autoplay: {
            delay: 3000
            , disableOnInteraction: false
        , }
        , navigation: {
            nextEl: ".swiper-button-next"
            , prevEl: ".swiper-button-prev"
        , }
        , breakpoints: {
            768: {
                slidesPerView: 4
            }
            , 1024: {
                slidesPerView: 5
            }
        }
    });

</script>

<script>
    var swiper = new Swiper(".associate-slider", {
        slidesPerView: 3
        , spaceBetween: 20
        , loop: true
        , autoplay: {
            delay: 3000
            , disableOnInteraction: false
        , }
        , navigation: {
            nextEl: ".swiper-button-next"
            , prevEl: ".swiper-button-prev"
        , }
        , breakpoints: {
            768: {
                slidesPerView: 4
            }
            , 1024: {
                slidesPerView: 5
            }
        }
    });

</script>


@endpush
