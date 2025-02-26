<div class="footer-area panel" data-color="black">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-social-address">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="footer-social-address-content" data-aos="fade-right" data-aos-duration="1000"
                                data-aos-once="true">
                                <h4>Stay with us On Social</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="footer-social-icon" data-aos="fade-left" data-aos-duration="1000"
                                data-aos-once="true">
                                <ul>
                                    <li class="text">FOLLOW US :</li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            use App\Models\ContactDetails;
            $contactDetails = ContactDetails::orderBy("id","desc")->whereNull('deleted_at')->first();
        @endphp
        <div class="row add-footer-class">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!--  <div class="footer-logo">
            <a href="index.html"><img src="images/home1/logo.png" alt="logo"></a>
            </div> -->
                <div class="footer-widget-title">
                    <h4>Contact Us</h4>
                </div>
                <div class="footer-contect-info">
                    <!-- <div class="footer-contact-info-title">
              <h4>Contact</h4>
              </div> -->
                    <ul>
                        <li><i class="fa fa-map-marker"></i>
                            {{ $contactDetails->company_address }}<br>
                            <a href="{{ $contactDetails->location_map_link }}" class="view_map" target="_blank">View
                                Map <i class="fa fa-angle-right"></i></a>
                        </li>
                        <li><i class="fa fa-phone"></i> <a href="tel:{{ $contactDetails->company_mobile_no }}">{{ $contactDetails->company_mobile_no }}</a></li>
                        <li><i class="fa fa-envelope"></i> <a href="mailto:{{ $contactDetails->company_email }}">{{ $contactDetails->company_email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Quick Links</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            <li><a href="{{ route('frontend.about-us') }}"><i class="fa fa-angle-right"></i>About J4C</a></li>
                            <li><a href="{{ route('frontend.our-usp') }}"><i class="fa fa-angle-right"></i>Our USP</a></li>
                            <li><a href="{{ route('frontend.sustainability') }}"><i class="fa fa-angle-right"></i>Sustainability</a></li>
                            <li><a href="{{ route('frontend.careers') }}"><i class="fa fa-angle-right"></i>Careers</a></li>
                            <li><a href="{{ route('frontend.contact') }}"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            @php
                use App\Models\ProjectType;

                $project_types = ProjectType::orderBy("id","asc")->whereNull('deleted_at')->get();
            @endphp
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Projects</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            @foreach($project_types as $project_type)
                                <li>
                                    <a href="{{ route('frontend.projects', ['slug' => $project_type->slug]) }}">
                                        <i class="fa fa-angle-right"></i>
                                        {{ $project_type->project_type }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Newsletter</h4>
                    </div>
                    <p>Subscribe our Newsletter</p>
                    <form action="#">
                        <div class="single-newsletter-box">
                            <input type="text" name="Email" placeholder="Enter E-mail" required="">
                            <div class="button" id="button-2">
                                <div id="slide"></div>
                                <a href="#">Subscribe Now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row footer-bottom">
                <div class="col-md-12 text-center">
                    <div class="footer-bottom-content">
                        <p>Copyright {{ date('Y') }} J4C Group | All Rights Reserved | Designed & Developed by <a href="">Matrix Bricks</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Popup -->
<div class="modal fade enquiry-now-modal-sec" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header enquiry-now-modal-header-sec">
                <h5 class="modal-title enquiry-now-modal-title-sec" id="enquiryModalLabel">Enquiry Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="enquiryForm">
                    <div class="row">
                    <div class="col-lg-6">
                <div class="single-input-box crs-input-box-sec">
                <input type="text" name="name" placeholder="Your Name*" pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only." required="">
                </div>
            </div>
                    <div class="col-lg-6">
                <div class="single-input-box crs-input-box-sec">
                <input type="text" name="Email" placeholder="Your Email*" required="">
                </div>
            </div>
                    <div class="col-lg-6">
                <div class="single-input-box crs-input-box-sec">
                <input type="text" name="Phone" placeholder="Phone Number*" required="">
                </div>
            </div>
                    <div class="col-lg-6">
                <div class="single-input-box crs-input-box-sec">
                <input type="text" name="Subject" placeholder="Subject*" required="">
                </div>
            </div>
                    <div class="col-lg-12">
                <div class="single-input-box crs-input-box-sec">
                <textarea name="Massage" placeholder="Write Message"></textarea>
                </div>
            </div>
                    <div class="col-lg-12">
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
