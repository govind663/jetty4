@extends('frontend.layouts.master')

@section('title')
    J4C Group | Careers
@endsection

@push('styles')
@endpush

@section('content')
    <!--breadcrumb section start-->
    <div class="breadcumb-area"
        style="background-image:url({{ asset('/j4c_Group/breadcrumb_image/' . $breadcrumbs->breadcrumb_image) }})">
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

    <section class="careers_sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="careers_img" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <img src="{{ asset('/j4c_Group/about_career/image/' . $about_career->image) }}"
                            class="img-responsive">
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
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="section-title" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
                        <h1>Current Openings</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="current-opening-serach-box-sec">
                        <div class="input-group">
                            <input type="text" id="jobSearch" class="form-control"
                                placeholder="Search for a job title...">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($current_openings as $value)
                <div class="row align-items-center job-item"> {{-- Added job-item class --}}
                    <div class="col-md-10">
                        <div class="job-title">
                            <h3 class="job-title-text">{{ $value->designation }}</h3> {{-- Added class for JavaScript --}}
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
                        <div class="button jd-button" id="button-2"
                            data-aos-once="true">
                            <div id="slide"></div>
                            <a href="{{ asset('/j4c_Group/current_opening/image/' . $value->document_file) }}"
                                target="_blank">Download</a>
                        </div>
                        <div class="button" id="button-2"
                            data-aos-once="true">
                            <div id="slide"></div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#applyModal_{{ $value->id }}">Apply Now</a>
                        </div>
                    </div>
                </div>
                {{-- <hr class="hr-blue"> --}}
            @endforeach

            <div id="noResultsMessage" style="display: none; text-align: center; padding: 20px; font-size: 18px; color: red;">
                No jobs found.
            </div>

        </div>
    </section>

    {{-- Careers Wrap One --}}
    <section class="careers-wrap-one"
        style="background-image:url('{{ asset('/j4c_Group/carrier_details/image/' . $carrier_details->image) }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="career-title-one" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
                        <h3>{{ $carrier_details->title }}</h3>
                        <h5>{!! $carrier_details->description !!}</h5>
                        {!! $carrier_details->other_description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Structure -->
    @foreach ($current_openings as $value)
        <div class="modal fade careeers-pop-sec" id="applyModal_{{ $value->id }}" tabindex="-1"
            aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header crs-tle-sec">
                        <h5 class="modal-title crs-tle-sub-sec" id="applyModalLabel">Apply Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#"  data-aos-once="true">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-box crs-input-box-sec">
                                        <input type="text" name="name" placeholder="Your Name*"
                                            pattern="[A-Za-z\s]+" title="Please enter alphabetic characters only."
                                            required="">
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
                                        <input type="text" name="Position Applying For"
                                            placeholder="Position Applying For*" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-input-box crs-input-box-sec crs-upload-sec file-upload-container">
                                        <input class="resume-upload-sec" type="file" name="resume" id="resume"
                                            accept=".pdf,.doc,.docx" required>
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
<script>
    document.getElementById("jobSearch").addEventListener("keyup", function () {
        let filter = this.value.toLowerCase();
        let jobs = document.querySelectorAll(".job-item");
        let noResultMessage = document.getElementById("noResultsMessage");
        let found = false; // Flag to track if any job is found

        jobs.forEach(function (job) {
            let title = job.querySelector(".job-title-text").textContent.toLowerCase();
            if (title.includes(filter)) {
                job.style.display = "flex"; // Show matching jobs
                found = true;
            } else {
                job.style.display = "none"; // Hide non-matching jobs
            }
        });

        // Show/hide "No jobs found" message based on search results
        if (found) {
            noResultMessage.style.display = "none";
        } else {
            noResultMessage.style.display = "block";
        }
    });
</script>
@endpush
