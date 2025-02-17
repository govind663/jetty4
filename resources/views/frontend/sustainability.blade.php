@extends('frontend.layouts.master')

@section('title')
    J4C Group | Sustainability
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
                            <h4>Sustainability</h4>
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
                            <li>Sustainability</li>
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
                        <img src="frontend/assets/images/sustainability/sustainability-img.jpg" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="sustainability_content">
                        <p>At J4C, we are committed to building a sustainable future. Our approach to construction integrates environmental responsibility, innovative design, and energy-efficient solutions, ensuring that every project we undertake aligns with global sustainability goals. </p>
                        <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                            <h1>Key Pillars of Our Sustainability Commitment </h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="key_pillar" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
                                    <h5><span>01</span> Eco-Friendly Designs</h5>
                                    <p>Incorporating green building materials and energy-efficient technologies to minimize environmental impact.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="key_pillar" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                                    <h5><span>02</span> Optimized Resource Use</h5>
                                    <p>Implementing strategies to reduce waste, conserve water, and maximize energy efficiency throughout the construction process.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="key_pillar" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
                                    <h5><span>03</span> Renewable Energy Integration</h5>
                                    <p>Designing projects that support the use of renewable energy systems, ensuring long-term sustainability.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="key_pillar" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true">
                                    <h5><span>04</span> Smart Solutions for Green Spaces</h5>
                                    <p>Creating environmentally harmonious commercial spaces, such as IT parks and data centers, that prioritize low-carbon footprints and optimized operational performance. </p>
                                </div>
                            </div>
                        </div>
                        <p>We believe that sustainable construction is not just an option—it's a responsibility. By aligning our practices with the highest environmental standards, we deliver projects that not only meet today’s needs but also preserve resources for future generations. </p>
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
                        <h1>Safety Commitment</h1>
                        <p>Safety and quality are integral to everything we do. With certifications in Quality Management (ISO 9001:2015), Environmental Management (ISO 14001:2015), and Occupational Health & Safety (ISO 45001:2015), we uphold the highest standards to protect our workforce, deliver exceptional projects, and build trust with our clients. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="services-area residential-main-page-sec">
        <div class="container">
            <div class="section-title sus-title-sec" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                <h1>Our Safety Initiatives</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper our-safety-initiatives-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/regular-safety-meeting.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Regular Safety Meetings</h3>
                                        <p>We conduct regular safety meetings to promote awareness and address on-site risks. These sessions
                                            cover
                                            hazard identification, emergency preparedness, proper PPE usage, ergonomic practices, and more,
                                            ensuring
                                            a well-informed and safety-conscious workforce.</p>
                                        <span><img src="frontend/assets/images/icons/safety-meeting.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/safety-nets.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Safety Nets for Height Work</h3>
                                        <p>Safety nets are installed and inspected regularly to protect employees working at heights. This
                                            proactive measure minimizes fall risks and reinforces our commitment to secure working conditions.</p>
                                        <span><img src="frontend/assets/images/icons/safety-net.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/fire-drills.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Fire Drills</h3>
                                        <p>Regular fire drills prepare our teams to handle emergencies effectively. Training focuses on evacuation
                                            routes, assembly points, and using firefighting equipment, ensuring readiness and safety for all.</p>
                                        <span><img src="frontend/assets/images/icons/fire-drills.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/demo-bg.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Lorem ipsum</h3>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In accusantium odio sint quod harum assumenda, quos commodi nam, voluptates, obcaecati ex nisi porro. Iste et dicta reprehenderit explicabo excepturi est! Quia, delectus?</p>
                                        <span><img src="frontend/assets/images/icons/safety-meeting.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
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
    </section> --}}

    <section class="services-area residential-main-page-sec">
        <div class="container">
            <div class="section-title sus-title-sec" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                <h1>Our Safety Initiatives</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper our-safety-initiatives-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/regular-safety-meeting.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Regular Safety Meetings</h3>
                                        <p>We conduct regular safety meetings to promote awareness and address on-site risks. These sessions
                                            cover
                                            hazard identification, emergency preparedness, proper PPE usage, ergonomic practices, and more,
                                            ensuring
                                            a well-informed and safety-conscious workforce.</p>
                                        <span><img src="frontend/assets/images/icons/safety-meeting.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/safety-nets.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Safety Nets for Height Work</h3>
                                        <p>Safety nets are installed and inspected regularly to protect employees working at heights. This
                                            proactive measure minimizes fall risks and reinforces our commitment to secure working conditions.</p>
                                        <span><img src="frontend/assets/images/icons/safety-net.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="res-single-services">
                                    <img src="frontend/assets/images/sustainability/fire-drills.jpg" alt="Image" class="img-responsive">
                                    <div class="services-content">
                                        <h3>Fire Drills</h3>
                                        <p>Regular fire drills prepare our teams to handle emergencies effectively. Training focuses on evacuation
                                            routes, assembly points, and using firefighting equipment, ensuring readiness and safety for all.</p>
                                        <span><img src="frontend/assets/images/icons/fire-drills.png" alt="Exterior Spray Treatments"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Navigation Buttons -->
                        {{-- <div class="swiper-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
<script>
    var swiper = new Swiper(".our-safety-initiatives-slider", {
        slidesPerView: 3, // Default for large screens
        spaceBetween: 20
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
            320: {
                slidesPerView: 1
            }, // Mobile screens
            576: {
                slidesPerView: 2
            }, // Small screens
            768: {
                slidesPerView: 2
            }, // Tablets
            1024: {
                slidesPerView: 3
            }, // Laptops
            1280: {
                slidesPerView: 3
            } // Large desktops
        }
    });

</script>

@endpush
