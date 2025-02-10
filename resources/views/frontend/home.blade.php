@extends('frontend.layouts.master')

@section('title')
J4C Group | Home
@endsection

@push('styles')
@endpush

@section('content')
    <div id="carouselExampleCaptions" class="main_slider carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">

            <!--Slider-4-->
            <div class="carousel-item hero-area active">
                <video width="100%" class="elVideo" loop="loop" autoPlay playsInline muted
                    src="{{ asset('frontend/assets/images/banner/banner-video1.mp4') }}" id='video-slider-3'>
                </video>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Building Tomorrow’s Business <br>Spaces with Precision and Excellence</h5>
                    <div class="button" id="button-2" data-animation="fadeInUp" data-delay="1000ms">
                        <div id="slide"></div>
                        <a href="#">Connect With Us</a>
                    </div>
                </div>
            </div>

            <!--Slider-3-->
            <div class="carousel-item hero-area">
                <img src="{{ asset('frontend/assets/images/banner/banner3.webp') }}" class="d-block w-100" alt="..." loading="lazy">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Brick By Brick,<br> We Build Your Vision.</h5>
                    <div class="button" id="button-2" data-animation="fadeInUp" data-delay="1000ms">
                        <div id="slide"></div>
                        <a href="#">Connect With Us</a>
                    </div>
                </div>
            </div>

            <!--Slider-2-->
            <div class="carousel-item hero-area">
                <img src="{{ asset('frontend/assets/images/banner/banner4.webp') }}" class="d-block w-100" alt="..." loading="lazy">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Transforming the<br> vision into realties.</h5>
                    <div class="button" id="button-2" data-animation="fadeInUp" data-delay="1000ms">
                        <div id="slide"></div>
                        <a href="#">Connect With Us</a>
                    </div>
                </div>
            </div>

            <!--Slider-1-->
            <div class="carousel-item hero-area">
                <video width="100%" class="elVideo" loop="loop" autoPlay playsInline muted
                    src="{{ asset('frontend/assets/images/banner/banner-video2.mp4') }}" id='video-slider-3'>
                </video>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Leading the way, INDIA's premier developer of Data Center Buildings.</h5>
                    <div class="button" id="button-2" data-animation="fadeInUp" data-delay="1000ms">
                        <div id="slide"></div>
                        <a href="#">Connect With Us</a>
                    </div>
                </div>
            </div>
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

    <section class="echofy-text-section" data-cues="zoomIn">
        <div class="inner-container">
            <div class="marquee">
                <div class="marquee-block">
                    <div class="content-box">
                        <h6 class="title"><span>8</span> Ongoing Projects</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>3.5 Mn</span> Sq. Ft. Under Construction</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>3</span> Completed Projects</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>200 +</span> Skilled Professionals</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>1500 +</span> Labour Strength</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>15 +</span> Years of Core Team Expertise</h6>
                    </div>
                </div>
                <div class="marquee-block">
                    <div class="content-box">
                        <h6 class="title"><span>6</span> Ongoing Projects</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>3.5 Mn</span> Sq. Ft. Under Construction</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>3</span> Completed Projects</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>200 +</span> Skilled Professionals</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>1500 +</span> Labour Strength</h6>
                    </div>
                    <div class="content-box">
                        <h6 class="title"><span>15 +</span> Years of Core Team Expertise</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="about-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-thumb" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="frontend/assets/images/about-img.webp" width="546" height="478" alt="About us image">
                        <img class="about-thumb-shape" src="frontend/assets/images/shape/about-sahpe.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title left">
                            <!--  <h4>About J4C</h4> -->
                            <h1>Welcome To J4C Group</h1>
                        </div>
                        <p>Jett 4 Construction is an organisation with collective experience of more than 15 years in the
                            construction industry, specialising in the development of buildings with special functions
                            including data centers, commercial IT parks etc. We provide innovative solutions and top-tier
                            services to our clients. Our team of seasoned professionals consistently exceeds industry
                            standards, ensuring customer satisfaction and robust operational support. With our extensive
                            expertise, we have undertaken numerous projects and achieved success, earning a reputation for
                            reliability and excellence in the industry.</p>
                        <!-- <p>Our steadfast reputation for professionalism, integrity, and excellence is supported by a proven track record of consistently delivering outstanding results. With our extensive expertise in mobilisation of resources including arrangement of dedicated labour force, we are well-equipped to manage large, complex projects across various industry sectors. Our approach is defined by an unwavering commitment to quality, innovation, and punctual delivery, ensuring that our clients' expectations are met and surpassed. This dedication has allowed us to forge lasting relationships and achieve consistency in performance with repeat business.</p> -->
                        <div class="button" id="button-2">
                            <div id="slide"></div>
                            <a href="#">Read More</a>
                        </div>
                        {{-- <div class="about-shape-1">
                            <img src="frontend/assets/images/home1/about-shape-1.png" alt="">
                        </div>
                        <div class="about-shape-2">
                            <img src="frontend/assets/images/home1/about-shape-2.png" alt="">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="datacenter-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="datacenter-img">
                        <img src="frontend/assets/images/projects/data-center-9-chandivali.webp" width="451" height="455"
                            class="img-responsive" alt="Comprehensive End-to-End Construction Solutions for Data Centers">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="section-title left" data-aos="fade-down" data-aos-duration="1500" data-aos-once="true">
                        <h1>Comprehensive End-to-End Construction Solutions for Data Centers:</h1>
                    </div>
                    <div class="faqs-container" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Conceptual Planning</h2>
                            <div class="faq-answer">
                                <div class="desc">As soon as we secure a project, we initiate the process with a
                                    comprehensive concept plan tailored to the client’s needs.</div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Regulatory Approvals</h2>
                            <div class="faq-answer">
                                <div class="desc">We engage with the relevant statutory departments to obtain all necessary
                                    permissions for the designated site.</div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Design Development</h2>
                            <div class="faq-answer">
                                <div class="desc">Upon receiving the required permissions, we proceed to the detailed design
                                    phase.</div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Integrated Architectural and Engineering Design</h2>
                            <div class="faq-answer">
                                <div class="desc">Our team of architects and engineers, including MEP (Mechanical,
                                    Electrical, and Plumbing) and structural experts, collaborate to create a robust design
                                    blueprint.</div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Project Planning and Execution</h2>
                            <div class="faq-answer">
                                <div class="desc">With the design finalized, we move into meticulous project planning and
                                    execution, ensuring timely progress and adherence to quality standards.</div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Occupancy Certification</h2>
                            <div class="faq-answer">
                                <div class="desc">After the construction is completed, we secure the necessary occupancy
                                    certificates, validating that the project meets all regulatory requirements.</div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">&#x27A4; Project Handover</h2>
                            <div class="faq-answer">
                                <div class="desc">Finally, we ensure a smooth handover of the fully functional data center
                                    to the client, ready for operation.</div>
                            </div>
                        </div>
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
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/data-center-9-chandivali.webp" alt="Data Center 9" width="358"
                                        height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Data Center 9 </h3>
                                        <p><i class="fa fa-map-marker"></i> Chandivali, Mumbai</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/admin-building-nav-02.webp" alt="Admin Building" width="358"
                                        height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Admin Building</h3>
                                        <p><i class="fa fa-map-marker"></i> Airoli, Navi Mumbai</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/EDGE-DC-KOL-01.webp" alt="Edge DC - KOL 01" width="358"
                                        height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Edge DC - KOL 01</h3>
                                        <p><i class="fa fa-map-marker"></i> New Town, Kolkata</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="section-title" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <h1>Completed Projects</h1>
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
                        <h1>Ongoing Projects</h1>
                        <p>To gain deeper insights into our performance in the current landscape, please explore our current
                            projects in the following slides. These projects exemplify our expertise and showcase our
                            ability.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="project-list-1 owl-carousel">
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/data-center-10-chandivali.webp" alt="Data Center 10 (DC 10)"
                                        width="358" height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Data Center 10 (DC 10)</h3>
                                        <p><i class="fa fa-map-marker"></i> Chandivali, Mumbai</p>
                                        <div class="service-button">
                                            <a href="#"><span>&#x2197;</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/data-center-dc-11.webp" alt="Data Center 11 (DC 11)"
                                        width="358" height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Data Center 11 (DC 11)</h3>
                                        <p><i class="fa fa-map-marker"></i> Chandivali, Mumbai</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/data-center-3-airoli.webp" alt="Data Center 3" width="358"
                                        height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Data Center 3 </h3>
                                        <p><i class="fa fa-map-marker"></i> Airoli, Navi Mumbai</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/bom-10-digital-connexion.webp"
                                        alt="BOM - 10 (Digital Connexion)" width="358" height="361" loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>BOM - 10 (Digital Connexion)</h3>
                                        <p><i class="fa fa-map-marker"></i> Chandivali, Mumbai</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="project_img">
                                    <img src="frontend/assets/images/projects/block-d-piramal-agastya-corporate-park.webp"
                                        alt="Block D, Agastya Piramal Corporate Park" width="358" height="361"
                                        loading="lazy">
                                    <div class="project_text">
                                        <h4>Commercial Project</h4>
                                        <h3>Block D, Agastya Piramal Corporate Park</h3>
                                        <p><i class="fa fa-map-marker"></i> Kurla, Mumbai</p>
                                        <a href="#"><span>&#x2197;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose-area home-seven">
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
                            <h1>Our Team</h1>
                        </div>
                        <p>At J4C, we are dedicated to building more than just structures - we are committed to building a
                            culture of safety, quality, and excellence. Our team members are selected not just for their
                            skills but for their dedication to pushing boundaries and striving for greatness in every aspect
                            of their lives. By joining us, you’ll become part of a growing company that values continuous
                            learning and the pursuit of excellence. Discover the intricacies of working with a
                            forward-thinking team that prioritises not only the completion of work but also the journey of
                            getting there.</p>
                        <div class="button" id="button-2">
                            <div id="slide"></div>
                            <a href="#">Join Our Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-shape">
            {{-- <img src="assets/frontend/assets/images/home7/hero-shape.png" alt=""> --}}
        </div>
    </div>

    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center" data-aos="fade-down" data-aos-duration="1500"
                        data-aos-once="true">
                        <!-- <h4>Clients</h4> -->
                        <h1>Our Clientele</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="brand-list-1 owl-carousel">
                    <div class="single-brand-box">
                        <img class="d-inline-block" src="frontend/assets/images/partner/piramal.jpg" alt="Piramal" width="200" height="100"
                            loading="lazy" />
                    </div>
                    <div class="single-brand-box">
                        <img class="d-inline-block" src="frontend/assets/images/partner/balaji.jpg" alt="Balaji" width="200" height="100"
                            loading="lazy" />
                    </div>
                    <div class="single-brand-box">
                        <img class="d-inline-block" src="frontend/assets/images/partner/NTT.jpg" alt="NTT" width="200" height="100"
                            loading="lazy" />
                    </div>
                    <div class="single-brand-box">
                        <img class="d-inline-block" src="frontend/assets/images/partner/digital-connexion.jpg" alt="Digital Connexion"
                            width="200" height="100" loading="lazy" />
                    </div>
                    <div class="single-brand-box">
                        <img class="d-inline-block" src="frontend/assets/images/partner/nirlon.jpg" alt="Nirlon" width="200" height="100"
                            loading="lazy" />
                    </div>
                    <div class="single-brand-box">
                        <img class="d-inline-block" src="frontend/assets/images/partner/lumina.jpg" alt="Lumina" width="200" height="100"
                            loading="lazy" />
                    </div>
                </div>
            </div>
            <!--<div class="single-shape">-->
            <!--  <img src="frontend/assets/images/home1/brand-shape.png" alt="">-->
            <!--</div>-->
        </div>
    </div>

    <div class="associate-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="section-title left" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <!-- <h4><img src="frontend/assets/images/home1/section-shape.png" alt="">Partners</h4> -->
                        <h1>Our Associates</h1>
                        <p class="associate-para-area">Apart from the conventional formwork, we are expertise with the
                            following formwork.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 asso-desk-sec">
                    <!--  <div class="echofy-button" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                <a href="#">Become Our Associate</a>
                </div> -->
                    <div class="button" id="button-2">
                        <div id="slide"></div>
                        <a href="#">Become Our Associate</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="associate-logo owl-carousel">
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/alsina.jpg" alt="alsina" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/cape.jpg" alt="cape" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/doka.jpg" alt="doka" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/electromech.jpg" alt="electromech"
                                width="200" height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/jindal.jpg" alt="jindal" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/kumkang.jpg" alt="kumkang" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/MEFS.jpg" alt="MEFS" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/meva.jpg" alt="meva" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/MFE.jpg" alt="MFE" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/mivan.webp" alt="mivan" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/PEC.jpg" alt="PEC" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/peri-logo.png" alt="peri-logo" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/pranav-logo.png" alt="pranav-logo"
                                width="200" height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/rmd.jpg" alt="" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/s-form.jpg" alt="s-form" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/SIS.jpg" alt="SIS" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/tabla-logo.jpg" alt="tabla" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/UBSC.jpg" alt="UBSC" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/ultratech.jpg" alt="ultratech" width="200"
                                height="100" loading="lazy" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-brand-box">
                            <img class="d-inline-block" src="frontend/assets/images/associates/viva.jpg" alt="viva" width="200" height="100"
                                loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 assco-sec">
                    <div class="associ-btn-sec">
                        <div class="button" id="button-2">
                            <div id="slide"></div>
                            <a href="#">Become Our Associate</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-shape">
                {{-- <img src="frontend/assets/images/home1/brand-shape.png" alt=""> --}}
            </div>
        </div>
    </div>

    <div class="blog-area home-blog-new-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home-blog-title-sec">
                        <h1>Latest Blogs</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-box">
                        <div class="single-home-blog-thumb-sec">
                            <img src="frontend/assets/images/blog/blog-home-1.webp" alt="">
                        </div>
                        <div class="home-blog-content-sec">
                            <div class="home-blog-date-sec">
                                <ul>
                                    <li><img src="frontend/assets/images/icons/date-icon.webp" alt="Date Icon">1 Jan 2025</li>
                                    <li><img src="frontend/assets/images/icons/location-icon.webp" alt="Location Icon">Mumbai</li>
                                </ul>
                            </div>
                            <h4><a href="blog-details.html">Lorem ipsum dolor sit, amet consectetur adipisicing</a></h4>
                            <div class="home-blog-service-button-sec">
                                <a href="blog-details.html">Read More <img src="frontend/assets/images/icons/up-right-arrow.png" alt=""></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-box">
                        <div class="single-home-blog-thumb-sec">
                            <img src="frontend/assets/images/blog/blog-2.webp" alt="">
                        </div>
                        <div class="home-blog-content-sec">
                            <div class="home-blog-date-sec">
                                <ul>
                                    <li><img src="frontend/assets/images/icons/date-icon.webp" alt="Date Icon">1 Jan 2025</li>
                                    <li><img src="frontend/assets/images/icons/location-icon.webp" alt="Location Icon">Mumbai</li>
                                </ul>
                            </div>
                            <h4><a href="blog-details.html">Lorem ipsum dolor sit, amet consectetur adipisicing</a></h4>
                            <div class="home-blog-service-button-sec">
                                <a href="blog-details.html">Read More <img src="frontend/assets/images/icons/up-right-arrow.png" alt=""></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-box">
                        <div class="single-home-blog-thumb-sec">
                            <img src="frontend/assets/images/blog/blog-3.webp" alt="">
                        </div>
                        <div class="home-blog-content-sec">
                            <div class="home-blog-date-sec">
                                <ul>
                                    <li><img src="frontend/assets/images/icons/date-icon.webp" alt="Date Icon">1 Jan 2025</li>
                                    <li><img src="frontend/assets/images/icons/location-icon.webp" alt="Location Icon">Mumbai</li>
                                </ul>
                            </div>
                            <h4><a href="blog-details.html">Lorem ipsum dolor sit, amet consectetur adipisicing</a></h4>
                            <div class="home-blog-service-button-sec">
                                <a href="blog-details.html">Read More <img src="frontend/assets/images/icons/up-right-arrow.png" alt=""></a>
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
