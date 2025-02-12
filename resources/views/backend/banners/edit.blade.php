@extends('backend.layouts.master')

@section('title')
    J4C Group | Edit Banner
@endsection

@push('styles')
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edit Banner</h4>
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
                                <a href="{{ route('banner.index') }}">Banner</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Banner</li>
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
                            <form method="POST" action="{{ route('banner.update', $banner->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <input type="text" id="id" name="id" hidden  value="{{ $banner->id }}">

                                <div class="pd-20 card-box mb-30">

                                    <div class="form-group row mt-3">
                                        <label class="col-sm-2"><b>Upload Image : </b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .webp" name="banner_image" id="banner_image" class="form-control @error('banner_image') is-invalid @enderror" value="{{ $banner->banner_image }}" placeholder="Upload Image.">
                                            <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .webp format can be uploaded .</b></small>
                                            <br>
                                            @error('banner_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="preview-container">
                                                <div id="file-preview"></div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                @if(!empty($banner->banner_image))
                                                    <img src="{{ asset('/j4c_Group/banner/banner_image/' . $banner->banner_image) }}" alt="Banner Image" style="width: 100px; height: auto;">
                                                @endif
                                            </div>
                                        </div>


                                        <label class="col-sm-2"><b>Upload Video : </b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="file" onchange="bannerVideoPreviewFile()" accept=".mp4" name="banner_video" id="banner_video" class="form-control @error('banner_video') is-invalid @enderror" value="{{ $banner->banner_video }}" placeholder="Upload Video.">
                                            <small class="text-secondary"><b>Note : The file size  should be less than 10MB .</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note : Only files in .mp4 format can be uploaded .</b></small>
                                            <br>
                                            @error('banner_video')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="preview-banner-video-container">
                                                <div id="file-banner-video-preview"></div>
                                            </div>
                                            @if(!empty($banner->banner_video))
                                                <video controls style="width: 100%; height: auto;">
                                                    <source src="{{ asset('/j4c_Group/banner/banner_video/' . $banner->banner_video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group row mt-3">
                                        <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $banner->title }}" placeholder="Enter Title.">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <select name="status" id="status" class="myselect form-control @error('status') is-invalid @enderror">
                                                <option value=" " >Select Status</option>
                                                <optgroup label="Status">
                                                    <option value="1" {{ $banner->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{ $banner->status == '2' ? 'selected' : '' }}>Inactive</option>
                                                </optgroup>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{ route('banner.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
{{-- Select2 JS --}}
<script type="text/javascript">
    $(".myselect").select2();
</script>

<script>
    // Function to preview the banner video
    function bannerVideoPreviewFile() {
        const videoInput = document.getElementById('banner_video');
        const videoPreviewContainer = document.getElementById('file-banner-video-preview');
        const file = videoInput.files[0];

        if (file) {
            const fileType = file.type;

            // Check if the uploaded file is an mp4 video
            if (fileType === 'video/mp4') {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create a video element to preview the video file
                    videoPreviewContainer.innerHTML = `
                        <video controls style="width: 100%; height: auto;">
                            <source src="${e.target.result}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                // Unsupported file type
                videoPreviewContainer.innerHTML = '<p>Unsupported file type. Please upload an .mp4 video.</p>';
            }
        } else {
            // No file selected
            videoPreviewContainer.innerHTML = '';
        }
    }

    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('banner_image');
        const previewContainer = document.getElementById('preview-container');
        const filePreview = document.getElementById('file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: auto; width: 100%;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
