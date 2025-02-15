@extends('frontend.layouts.master')

@section('title')
    J4C Group | Our USP
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
                            <h4>Our USP</h4>
                        </div>
                        <!--<ul>-->
                        <!--  <li><a href="index.html">Home</a></li>-->
                        <!--  <li>Our USP</li>-->
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
                            <li>Our USP</li>
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
                <h1>The J4C USP</h1>
                <p>J4C specializes in the full spectrum of construction services, offering end-to-end
                  solutions under one roof. We handle every stage of the construction process, from conceptualization and
                  design to delivery of completed premises. Here are some key areas where our expertise shines: </p>
              </div>
            </div>
            <div class="col-md-7">
              <div class="j4c_usp_slider owl-carousel">
                <div class="item">
                  <div class="single-service-box our-usp-ser-box our-usp-sub-sec-1">
                    <div class="services-icon-thumb">
                      <img src="{{ asset('frontend/assets/images/icons/building-types.png') }}" alt="">
                    </div>
                    <div class="services-content">
                      <h4>Building Types</h4>
                      <p>We design, construct, and deliver various structures, including residential buildings, commercial
                        complexes, IT parks, and data centers.</p>
                    </div>
                  </div>
                </div>
                <!-- === -->
                <div class="item">
                  <div class="single-service-box our-usp-ser-box our-usp-sub-sec-2">
                    <div class="services-icon-thumb">
                      <img src="{{ asset('frontend/assets/images/icons/government-approval.png') }}" alt="">
                    </div>
                    <div class="services-content">
                      <h4>Government Approvals</h4>
                      <p>Our team has an in-depth understanding of approval processes, helping us navigate regulatory
                        requirements quickly and effectively.</p>
                    </div>
                  </div>
                </div>
                <!-- === -->
                <div class="item">
                  <div class="single-service-box our-usp-ser-box our-usp-sub-sec-3">
                    <div class="services-icon-thumb">
                      <img src="{{ asset('frontend/assets/images/icons/diverse-workforce.png') }}" alt="">
                    </div>
                    <div class="services-content">
                      <h4>Diverse Workforce</h4>
                      <p>We draw from a broad labor pool with offices across West Bengal, Orissa, Bihar, and Uttar Pradesh,
                        ensuring that we have the right skills for every project. </p>
                    </div>
                  </div>
                </div>
                <!-- === -->
                <div class="item">
                  <div class="single-service-box our-usp-ser-box our-usp-sub-sec-4">
                    <div class="services-icon-thumb">
                      <img src="{{ asset('frontend/assets/images/icons/safety-standard.png') }}" alt="">
                    </div>
                    <div class="services-content">
                      <h4>Safety Standards</h4>
                      <p>Our robust safety protocols and efficient management practices are the foundation of our success.
                        We provide a conducive work environment that prioritizes the safety and well-being of our workforce,
                        fostering productivity and encouraging excellence. </p>
                    </div>
                  </div>
                </div>
                <!-- === -->
                <div class="item">
                  <div class="single-service-box our-usp-ser-box our-usp-sub-sec-5">
                    <div class="services-icon-thumb">
                      <img src="{{ asset('frontend/assets/images/icons/commitment.png') }}" alt="">
                    </div>
                    <div class="services-content">
                      <h4>Our Commitment</h4>
                      <p>J4C’s comprehensive approach to safety and quality reflects our commitment to the
                        health, safety, and satisfaction of our workforce and clients. By upholding rigorous safety
                        standards, continuously improving our quality management systems, and fostering a proactive culture,
                        we strive to set the standard for excellence in the construction industry. </p>
                    </div>
                  </div>
                </div>
                <!-- === -->
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
                        <h1>Our Unique Approach: Project Management Services </h1>
                        <p>Our project management services are designed to deliver seamless project execution from start to
                            finish. Here’s a closer look at how we ensure a smooth process:
                        </p>
                    </div>
                    <div class="faqs-container">
                        <div class="faq-singular active">
                            <h2 class="faq-question">Comprehensive Project Planning and Execution </h2>
                            <div class="faq-answer" style="display: block;">
                                <div itemprop="text">Our experienced project managers work meticulously to ensure that every
                                    aspect of the project is well-planned and executed. This includes resource allocation,
                                    scheduling, and quality control, ensuring that we stay on track and deliver high-quality
                                    results within the agreed timeframe.
                                </div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">In-House Design and Architecture Expertise</h2>
                            <div class="faq-answer">
                                <div itemprop="text">We collaborate with industry-leading partners in design and
                                    architecture to bring cutting-edge concepts to life. By leveraging their expertise and
                                    our established networks, we deliver designs that not only meet client requirements but
                                    also push the boundaries of creativity and functionality.
                                </div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">Streamlined Construction Approvals and Permissions</h2>
                            <div class="faq-answer">
                                <div itemprop="text">Navigating the regulatory landscape can be challenging. At Jett 4
                                    Construction, our dedicated in-house team specializes in securing all necessary
                                    permissions and approvals, from the initial construction clearance (CC) to the final
                                    Occupation Certificate (OC). With a deep understanding of government regulations and a
                                    streamlined process, we ensure timely approvals, preventing project delays.
                                </div>
                            </div>
                        </div>
                        <div class="faq-singular">
                            <h2 class="faq-question">Skilled Labor Force</h2>
                            <div class="faq-answer">
                                <div itemprop="text">Our team includes a workforce of approximately 6000 skilled
                                    individuals, enabling us to manage and coordinate labor requirements for projects of any
                                    scale. By harnessing the strength of our labor pool, we can efficiently deliver complex
                                    projects across diverse sectors, from residential and commercial spaces to IT parks and
                                    data centers.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="faqs-thumb">
                        <img src="frontend/assets/images/unique-approach.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="event-area qmkpi-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title center">
                        <h1>Quality Management - Key Performance Indicators (KPIs)</h1>
                        <p>To uphold our high standards of quality, we have established a robust Quality Management system
                            with Key Performance Indicators (KPIs) that guide our efforts toward continuous improvement. Our
                            quality KPIs include:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="fast-day" role="tabpanel" aria-labelledby="fast-day-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb qmkpi-img-sec">
                                                <img src="frontend/assets/images/icons/qul-1.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <h4>Reduce Defects</h4>
                                                </div>
                                            </div>
                                            <div class="event-icon">
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">At Jett 4 Construction, reducing defects is a core KPI,
                                                as we strive to
                                                maintain the highest standards of service delivery. Through comprehensive
                                                quality control
                                                processes and rigorous inspections, we identify and address potential issues
                                                early. By closely
                                                monitoring defect data, we implement preventive measures that continuously
                                                improve our
                                                processes, minimizing defects and enhancing client satisfaction.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb qmkpi-img-sec">
                                                <img src="frontend/assets/images/icons/qul-2.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <h4>Reduce Rework</h4>
                                                </div>
                                            </div>
                                            <div class="event-icon">
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">Reducing rework is essential to our quality and
                                                efficiency goals. Our
                                                proactive approach involves preventing errors through detailed root cause
                                                analysis and optimized
                                                processes. By investing in robust quality control procedures, we identify
                                                the underlying causes
                                                of rework and implement corrective actions to streamline our workflows. This
                                                commitment to
                                                reducing rework helps us optimize resources, reduce waste, and deliver
                                                high-quality results
                                                consistently.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb qmkpi-img-sec">
                                                <img src="frontend/assets/images/icons/qul-3.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <h4>Conduct Trainings</h4>
                                                </div>
                                            </div>
                                            <div class="event-icon">
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">Continuous learning is a cornerstone of our quality
                                                approach. Regular
                                                training programs equip our team with the necessary knowledge and skills to
                                                meet quality
                                                standards and follow best practices. Our training curriculum covers quality
                                                management
                                                principles, industry-specific regulations, and hands-on techniques in
                                                quality control. By
                                                fostering a culture of quality consciousness, we empower our workforce to
                                                deliver products and
                                                services that meet or exceed client expectations.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb qmkpi-img-sec">
                                                <img src="frontend/assets/images/icons/qul-4.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <h4>System Setup</h4>
                                                </div>
                                            </div>
                                            <div class="event-icon">
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">We prioritize the establishment of effective quality
                                                management systems as a
                                                key KPI. This includes comprehensive documentation, stringent process
                                                controls, and performance
                                                measurements. Standardized operating procedures and quality guidelines
                                                ensure consistency and
                                                adherence to quality standards across all operations. Through meticulous
                                                documentation and
                                                regular audits, we continuously review, update, and refine our quality
                                                management system,
                                                driving operational efficiency and fostering a culture of quality
                                                excellence.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb qmkpi-img-sec">
                                                <img src="frontend/assets/images/icons/qul-5.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <h4>Conduct Lessons Learned</h4>
                                                </div>
                                            </div>
                                            <div class="event-icon">
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">As part of our dedication to continuous improvement, we
                                                conduct regular
                                                lessons-learned sessions to capture valuable insights from each project. By
                                                reviewing both
                                                successes and challenges, we extract critical knowledge that enhances our
                                                practices, mitigates
                                                risks, and improves performance. These sessions allow us to share best
                                                practices across the
                                                organization and implement corrective actions that optimize our processes,
                                                leading to better
                                                quality outcomes and higher client satisfaction.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="second-day" role="tabpanel" aria-labelledby="second-day-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb">
                                                <img src="frontend/assets/images/home5/event-2.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <div class="event-date">
                                                        <span><i class="bi bi-clock"></i>Dec 13, 2024 @ 10:00 am</span>
                                                    </div>
                                                    <h4>Would You Like To See A Real Leopard Live?</h4>
                                                    <p>By <a href="#">Organizer</a> Logichunt Inc</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                                fingerstache fanny pack
                                                nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                Salvia esse flexitarian
                                                Truffaut synth art party deep v chillwave coffee ea next level moon beard in
                                            </p>
                                            <span><strong>Location:</strong> Hall 1, Building A , Golden Street ,
                                                Southafrica</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb">
                                                <img src="frontend/assets/images/home5/event-3.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <div class="event-date">
                                                        <span><i class="bi bi-clock"></i>Dec 13, 2024 @ 10:00 am</span>
                                                    </div>
                                                    <h4>Wildlife Safari Chronicles: Hunting For Leopards?</h4>
                                                    <p>By <a href="#">Organizer</a> Logichunt Inc</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                                fingerstache fanny pack
                                                nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                Salvia esse flexitarian
                                                Truffaut synth art party deep v chillwave coffee ea next level moon beard in
                                            </p>
                                            <span><strong>Location:</strong> Hall 1, Building A , Golden Street ,
                                                Southafrica</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="third-day" role="tabpanel" aria-labelledby="third-day-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb">
                                                <img src="frontend/assets/assets/images/home5/event-1.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <div class="event-date">
                                                        <span><i class="bi bi-clock"></i>Dec 13, 2024 @ 10:00 am</span>
                                                    </div>
                                                    <h4>Close Encounters with African Leopards A Safari Story?</h4>
                                                    <p>By <a href="#">Organizer</a> Logichunt Inc</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                                fingerstache fanny pack
                                                nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                Salvia esse flexitarian
                                                Truffaut synth art party deep v chillwave coffee ea next level moon beard in
                                            </p>
                                            <span><strong>Location:</strong> Hall 1, Building A , Golden Street ,
                                                Southafrica</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb">
                                                <img src="frontend/assets/assets/images/home5/event-3.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <div class="event-date">
                                                        <span><i class="bi bi-clock"></i>Dec 13, 2024 @ 10:00 am</span>
                                                    </div>
                                                    <h4>Wildlife Safari Chronicles: Hunting For Leopards?</h4>
                                                    <p>By <a href="#">Organizer</a> Logichunt Inc</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                                fingerstache fanny pack
                                                nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                Salvia esse flexitarian
                                                Truffaut synth art party deep v chillwave coffee ea next level moon beard in
                                            </p>
                                            <span><strong>Location:</strong> Hall 1, Building A , Golden Street ,
                                                Southafrica</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="four-day" role="tabpanel" aria-labelledby="four-day-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb">
                                                <img src="frontend/assets/assets/images/home5/event-1.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <div class="event-date">
                                                        <span><i class="bi bi-clock"></i>Dec 13, 2024 @ 10:00 am</span>
                                                    </div>
                                                    <h4>Close Encounters with African Leopards A Safari Story?</h4>
                                                    <p>By <a href="#">Organizer</a> Logichunt Inc</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                                fingerstache fanny pack
                                                nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                Salvia esse flexitarian
                                                Truffaut synth art party deep v chillwave coffee ea next level moon beard in
                                            </p>
                                            <span><strong>Location:</strong> Hall 1, Building A , Golden Street ,
                                                Southafrica</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-event">
                                        <div class="single-event-box">
                                            <div class="event-thumb">
                                                <img src="frontend/assets/assets/images/home5/event-4.png" alt="">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-titel">
                                                    <div class="event-date">
                                                        <span><i class="bi bi-clock"></i>Dec 13, 2024 @ 10:00 am</span>
                                                    </div>
                                                    <h4>Bangladesh Safari Thrills Spying On Leopards In The Wild?</h4>
                                                    <p>By <a href="#">Organizer</a> Logichunt Inc</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-desc-box">
                                            <p class="event-desc">
                                                Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                                fingerstache fanny pack
                                                nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                Salvia esse flexitarian
                                                Truffaut synth art party deep v chillwave coffee ea next level moon beard in
                                            </p>
                                            <span><strong>Location:</strong> Hall 1, Building A , Golden Street ,
                                                Southafrica</span>
                                        </div>
                                    </div>
                                </div>
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
