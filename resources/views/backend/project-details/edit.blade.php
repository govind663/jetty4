@extends('backend.layouts.master')

@section('title')
J4C Group | Edit Project Details
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Project Details</h4>
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
                        <li class="breadcrumb-item active">Edit Project Details</li>
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
                        <form method="POST" action="{{ route('project-details.update', $projectDetails->id) }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="text" id="id" name="id" hidden  value="{{ $projectDetails->id }}">

                            <div class="pd-20 card-box mb-30">
                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Project Name : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <select name="projects_id" id="projects_id" class="form-control myselect @error('projects_id') is-invalid @enderror">
                                            <option value="">Select Project Name</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}" {{ $projectDetails->projects_id == $project->id ? 'selected' : '' }}>{{ $project->project_name }}</option>
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
                                        <input type="text" name="slug" id="slug" readonly class="form-control @error('slug') is-invalid @enderror" value="{{ $projectDetails->slug }}" placeholder="Enter Event Slug.">
                                        @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Built up area : </b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="built_up_area" id="built_up_area" class="form-control @error('built_up_area') is-invalid @enderror" value="{{ $projectDetails->built_up_area }}" placeholder="Enter Built up area">
                                        @error('built_up_area')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>IT Load : </b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="it_load" id="it_load" class="form-control @error('it_load') is-invalid @enderror" value="{{ $projectDetails->it_load }}" placeholder="Enter IT Load">
                                        @error('it_load')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Developers : </b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="developers" id="developers" class="form-control @error('developers') is-invalid @enderror" value="{{ $projectDetails->developers }}" placeholder="Enter Developers">
                                        @error('developers')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Client Name : </b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ $projectDetails->client_name }}" placeholder="Enter Client Name">
                                        @error('client_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Structural Consultant : </b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="structural_consultant" id="structural_consultant" class="form-control @error('structural_consultant') is-invalid @enderror" value="{{ $projectDetails->structural_consultant }}" placeholder="Enter Structural Consultant">
                                        @error('structural_consultant')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Architect : </b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="architect" id="architect" class="form-control @error('architect') is-invalid @enderror" value="{{ $projectDetails->architect }}" placeholder="Enter architect">
                                        @error('architect')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3 p-3">
                                    <div class="d-flex justify-content-end mb-2">
                                        <button type="button" class="btn btn-primary" id="addAmenitiesRow"><b>Add More</b></button>
                                    </div>
                                    <table class="table table-bordered p-3" id="dynamicAmenitiesTable">
                                        <thead>
                                            <tr>
                                                <th><b>Uploaded Project Gallery Image : <span class="text-danger">*</span></b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $projectGalleryImage = json_decode($projectDetails->image, true) ?? [];
                                                $oldProjectGalleryImages = old('image', []);
                                            @endphp

                                            {{-- Display Existing Banner Images --}}
                                            @if(!empty($projectGalleryImage))
                                                @foreach($projectGalleryImage as $index => $image)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('/j4c_Group/project_details/image/' . $image) }}" alt="Uploaded Project Image" style="width: 200px; height: 100px;" class="img-thumbnail">
                                                            <input type="hidden" name="existing_project_gallery_images[]" value="{{ $image }}">

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger removeRow"><b>Remove</b></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            {{-- Display Newly Uploaded Images --}}
                                            @if($oldProjectGalleryImages)
                                                @foreach($oldProjectGalleryImages as $index => $value)
                                                    <tr>
                                                        <td>
                                                            <input type="file" id="image_{{ $index }}" onchange="previewFiles({{ $index }})" accept=".png, .jpg, .jpeg, .webp, .pdf" name="image[]" class="form-control @error('image.' . $index) is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                            <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .pdf files allowed.</b></small><br>
                                                            <div id="preview-image-container-{{ $index }}" style="display: none;">
                                                                <div id="file-image-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error('image.' . $index)
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
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

<script>
    $(document).ready(function () {
        let rowId = $('table#dynamicAmenitiesTable tbody tr').length;

        // Add a new row
        $('#addAmenitiesRow').click(function () {  // Corrected ID
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="file" id="image_${rowId}" onchange="previewFiles(${rowId})" accept=".png, .jpg, .jpeg, .webp, .pdf" name="image[]" class="form-control">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .pdf files allowed.</b></small>
                        <br>
                        <div id="preview-image-container-${rowId}" style="display: none;">
                            <div id="file-image-preview-${rowId}"></div>
                            <small class="text-danger" id="image-error-${rowId}"></small>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicAmenitiesTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });


    // Preview event_gallery_images
    function previewFiles(rowId) {
        const fileInput = document.getElementById(`image_${rowId}`);
        const previewContainer = document.getElementById(`preview-image-container-${rowId}`);
        const filePreview = document.getElementById(`file-image-preview-${rowId}`);
        const file = fileInput.files[0];

        if (!fileInput || !previewContainer || !filePreview) return; // Guard clause

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width:120px; height:100px;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview
                filePreview.innerHTML = `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="100px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
                filePreview.innerHTML += `<p>Please select a valid image or PDF file.</p>`;
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
