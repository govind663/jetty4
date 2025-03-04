@extends('backend.layouts.master')

@section('title')
    J4C Group | Edit Breadcrumb
@endsection

@push('styles')
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edit Breadcrumb</h4>
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
                                <a href="{{ route('breadcrumb.index') }}">Breadcrumb</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Breadcrumb</li>
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
                            <form method="POST" action="{{ route('breadcrumb.update', $breadcrumb->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <input type="text" id="id" name="id" hidden  value="{{ $breadcrumb->id }}">

                                <div class="pd-20 card-box mb-30">

                                    <div class="form-group row mt-3">
                                        <label class="col-sm-2"><b>Upload Breadcrumb Image : </b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .webp" name="breadcrumb_image" id="breadcrumb_image" class="form-control @error('breadcrumb_image') is-invalid @enderror" value="{{ $breadcrumb->breadcrumb_image }}" placeholder="Upload Breadcrumb Image.">
                                            <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .webp format can be uploaded .</b></small>
                                            <br>
                                            @error('breadcrumb_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="preview-container">
                                                <div id="file-preview"></div>
                                            </div>
                                            @if(!empty($breadcrumb->breadcrumb_image))
                                                <img src="{{ asset('/j4c_Group/breadcrumb_image/' . $breadcrumb->breadcrumb_image) }}" alt="{{ $breadcrumb->breadcrumb_image }}" style="width: auto; height: 100px;">
                                            @endif
                                        </div>

                                        <label class="col-sm-2"><b>Breadcrumb Title : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="breadcrumb_title" id="breadcrumb_title" class="form-control @error('breadcrumb_title') is-invalid @enderror" value="{{ old('breadcrumb_title', $breadcrumb->breadcrumb_title) }}" placeholder="Enter Breadcrumb Title.">
                                            @error('breadcrumb_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label class="col-sm-2"><b>Breadcrumb Type : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <select name="page_type" id="page_type" class="myselect form-control @error('page_type') is-invalid @enderror">
                                                <option value="">Select Breadcrumb Type</option>
                                                <optgroup label="Type">
                                                    <option value="1" {{ $breadcrumb->page_type == '1' ? 'selected' : '' }}>About J4C</option>
                                                    <option value="2" {{ $breadcrumb->page_type == '2' ? 'selected' : '' }}>Mission & Vision</option>
                                                    <option value="3" {{ $breadcrumb->page_type == '3' ? 'selected' : '' }}>Awards & Certifications</option>
                                                    <option value="4" {{ $breadcrumb->page_type == '4' ? 'selected' : '' }}>Our USP</option>
                                                    <option value="5" {{ $breadcrumb->page_type == '5' ? 'selected' : '' }}>Sustainability</option>
                                                    <option value="6" {{ $breadcrumb->page_type == '6' ? 'selected' : '' }}>Careers</option>
                                                    <option value="7" {{ $breadcrumb->page_type == '7' ? 'selected' : '' }}>Media Events</option>
                                                    <option value="8" {{ $breadcrumb->page_type == '8' ? 'selected' : '' }}>Contact Us</option>
                                                </optgroup>
                                            </select>
                                            @error('page_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <select name="status" id="status" class="myselect form-control @error('status') is-invalid @enderror">
                                                <option value="">Select Status</option>
                                                <optgroup label="Status">
                                                    <option value="1" {{ $breadcrumb->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{ $breadcrumb->status == '2' ? 'selected' : '' }}>Inactive</option>
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
                                            <a href="{{ route('breadcrumb.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('breadcrumb_image');
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
