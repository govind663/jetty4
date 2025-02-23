@extends('backend.layouts.master')

@section('title')
J4C Group | Edit Contact Details
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Contact Details</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('backend/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('contact-details.index') }}">Contact Details</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Contact Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body add-post">
                        <form method="POST" action="{{ route('contact-details.update', $contactDetails->id) }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="id" value="{{ $contactDetails->id }}">

                            <div class="pd-20 card-box mb-30">

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Mobile Number : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="company_mobile_no" id="company_mobile_no" class="form-control @error('company_mobile_no') is-invalid @enderror" value="{{ old('company_mobile_no', $contactDetails->company_mobile_no) }}" placeholder="Enter Mobile Number">
                                        @error('company_mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Email Id : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="email" name="company_email" id="company_email" class="form-control @error('company_email') is-invalid @enderror" value="{{ old('company_email', $contactDetails->company_email) }}" placeholder="Enter Email Id">
                                        @error('company_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Location Map Link : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="location_map_link" id="location_map_link" class="form-control @error('location_map_link') is-invalid @enderror" value="{{ old('location_map_link', $contactDetails->location_map_link) }}" placeholder="Enter Location Map Link">
                                        @error('location_map_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Location Map Iframe Link : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="location_map_iframe_link" id="location_map_iframe_link" class="form-control @error('location_map_iframe_link') is-invalid @enderror" value="{{ old('location_map_iframe_link', $contactDetails->location_map_iframe_link) }}" placeholder="Enter Location Map Iframe Link">
                                        @error('location_map_iframe_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Company Address : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <textarea name="company_address" id="company_address" class="form-control @error('company_address') is-invalid @enderror" placeholder="Enter Company Address" value="{{ old('company_address', $contactDetails->company_address) }}">{{ old('company_address', $contactDetails->company_address) }}</textarea>
                                        @error('company_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('contact-details.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success"><b>Submit</b></button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

@push('scripts')
{{-- Summernote Editor --}}
{{-- <script>
    $(document).ready(function() {
        $('#company_address').summernote({
            placeholder: 'Enter your company address here...',
            tabsize: 2,
            height: 100,
        });
    });
</script> --}}
@endpush
