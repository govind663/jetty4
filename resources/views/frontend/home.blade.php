@extends('frontend.layouts.master')

@section('title')
J4C Group | Home
@endsection

@push('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                <div class="carousel-item hero-area {{ $index == 0 ? 'active' : '' }}">

                    @if ($banner->banner_image)
                        <img src="{{ asset('/j4c_Group/banner/banner_image/' . $banner->banner_image) }}" class="d-block w-100" alt="Banner Image" loading="lazy">
                    @elseif ($banner->banner_video)
                        <video width="100%" class="elVideo" loop autoplay playsinline muted>
                            <source src="{{ asset('/j4c_Group/banner/banner_video/' . $banner->banner_video) }}" type="video/mp4">
                        </video>
                    @endif

                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $banner->title }}</h5>
                    </div>
                </div>
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
                    <div class="content-box">
                        @foreach ($statistics as $value)
                            <h6 class="title">
                                <span>{{ $value->description }}</span>
                                {{ $value->title }}
                            </h6>
                        @endforeach
                    </div>
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
                            <div class="col-lg-12">
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
                        <p>Our accomplished projects highlight our strength, emphasizing a customer-centric approach that
                            defines our commitment to exceeding expectations in every completed construction endeavor.</p>
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
                        <p>To gain deeper insights into our performance in the current landscape, please explore our current
                            projects in the following slides. These projects exemplify our expertise and showcase our
                            ability.</p>
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
    <div class="why-choose-area home-seven" style="background: url('{{ asset('/j4c_Group/teams/image/' . $teams->image) }}');">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center" data-aos="fade-down" data-aos-duration="1500" data-aos-once="true">
                        <h1>{{ $clients->title }}</h1>
                        <p style="text-align: center;">{!! $clients->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="brand-list-1 owl-carousel">
                    @foreach($clientsImages as $client)
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="{{ asset('/j4c_Group/clients/image/' . $client) }}" alt="{{ $client }}" width="200" height="100" loading="lazy" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Our Associates -->
    <div class="associate-area">
        <div class="container">
            <div class="row">
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
                <div class="associate-logo owl-carousel">
                    @foreach($associateImages as $as)
                        <div class="col-md-12">
                            <div class="single-brand-box">
                                <img class="d-inline-block" src="{{ asset('/j4c_Group/associates/image/' . $as) }}" alt="{{ $as }}" width="200" height="100" loading="lazy" />
                            </div>
                        </div>
                    @endforeach
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
@endpush
