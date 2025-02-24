@extends('frontend.layouts.master')

@section('title')
    J4C Group | Careers
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
                            <h4>Careers</h4>
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
                            <li>Careers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb section end-->

    <section class="careers_sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="careers_img" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="{{ asset('/j4c_Group/about_career/image/' . $about_career->image) }}" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="careers_text" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div class="section-title">
                            <h1>{{ $about_career->title }}</h1>
                        </div>
                        <p>{!! $about_career->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="openings_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>Current Openings </h1>
                    </div>
                </div>
            </div>
            @foreach ($current_openings as $value)
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="job-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h3>{{ $value->designation }}</h3>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            <b>Location</b> - {{ $value->location }}
                        </p>
                        <p class="text-justify">
                            {!! $value->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="button jd-button" id="button-2" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div id="slide"></div>
                        <a href="{{ asset('/j4c_Group/current_opening/image' . $value->document_file) }}" target="_blank">Download</a>
                    </div>
                    <div class="button" id="button-2" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
                        <div id="slide"></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#applyModal_{{ $value->id }}">Apply Now</a>
                    </div>
                </div>
            </div>
            <hr class="hr-blue">
            @endforeach
        </div>
    </section>

    {{-- Careers Wrap One --}}
    <section class="careers-wrap-one" style="background-image:url('{{ asset('frontend/assets/images/careers/career-img-bg.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="career-title-one" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
                        <h3>Ready to Elevate Your Career<span>?</span></h3>
                        <h5>We’re looking for talented individuals who are driven, detail-oriented, and passionate about
                            creating quality solutions.</h5>
                        <p>Fill out the form or share your resume at <a href="#">hr@j4cgroup.com</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Structure -->
    @foreach ($current_openings as $value)
    <div class="modal fade careeers-pop-sec" id="applyModal_{{ $value->id }}" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header crs-tle-sec">
                    <h5 class="modal-title crs-tle-sub-sec" id="applyModalLabel">Apply Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
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
                                    <input type="text" name="Position Applying For" placeholder="Position Applying For*" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-input-box crs-input-box-sec crs-upload-sec file-upload-container">
                                    <input class="resume-upload-sec" type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" required>
                                    <span id="file-name">Upload Resume (PDF/DOC)</span>
                                    <label for="resume" class="custom-file-upload">Choose File</label>
                                </div>
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
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@push('scripts')
@endpush
