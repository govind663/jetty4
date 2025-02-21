@extends('backend.layouts.master')

@section('title')
J4C Group | Add Project Details
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Add Project Details</h4>
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
                            <a href="{{ route('project-details.index') }}">Project Details</a>
                        </li>
                        <li class="breadcrumb-item active">Add Project Details</li>
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
                        <form method="POST" action="{{ route('project-details.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="pd-20 card-box mb-30">
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Project Name : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <select name="projects_id" id="projects_id" class="form-control myselect @error('projects_id') is-invalid @enderror" value="{{ old('projects_id') }}">
                                            <option value="">Select Project Name</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}" {{ old('projects_id') == $project->id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('projects_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Project Slug : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="slug" id="slug" readonly class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Enter Event Slug.">
                                        @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Project Location : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="project_location" id="project_location" class="form-control @error('project_location') is-invalid @enderror" value="{{ old('project_location') }}" placeholder="Enter Project Location">
                                        @error('project_location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Upload Project Image : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .webp" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" placeholder="Upload Image.">
                                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .webp format can be uploaded .</b></small>
                                        <br>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="preview-container">
                                            <div id="file-preview"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="project-details: flex; justify-content: flex-end;">
                                        <a href="{{ route('project-details.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
        const fileInput = document.getElementById('image');
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

{{-- fetch all project slug --}}
<script>
    $(document).ready(function () {
        $('#projects_id').on('change', function () {
            var projects_id = this.value;
            if (projects_id) {
                $.ajax({
                    url: "{{ route('fetch-project-slug') }}",
                    type: "POST",
                    data: {
                        projects_id: projects_id,
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function (result) {
                        // Assuming the server response is in the format { "slug": "your-slug-value" }
                        if (result.slug) {
                            $('#slug').val(result.slug);
                        } else {
                            $('#slug').val(''); // Clear the input if no slug is returned
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching slug: " + error);
                        $('#slug').val(''); // Clear the input on error
                    }
                });
            } else {
                $('#slug').val(''); // Clear the input if no project is selected
            }
        });
    });
</script>
@endpush
