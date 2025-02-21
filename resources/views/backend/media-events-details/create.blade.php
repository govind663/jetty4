@extends('backend.layouts.master')

@section('title')
J4C Group | Add Media & Eents Details
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Add Media & Eents Details</h4>
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
                            <a href="{{ route('media-details.index') }}">Media & Eents Details</a>
                        </li>
                        <li class="breadcrumb-item active">Add Media & Eents Details</li>
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
                        <form method="POST" action="{{ route('media-details.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="pd-20 card-box mb-30">

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Event Name : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <select name="media_events_id" id="media_events_id" class="form-control myselect @error('media_events_id') is-invalid @enderror" value="{{ old('media_events_id') }}">
                                            <option value="">Select Event Name</option>
                                            @foreach ($media_events as $media_event)
                                                <option value="{{ $media_event->id }}" {{ old('media_events_id') == $media_event->id ? 'selected' : '' }}>{{ $media_event->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('media_events_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Event Slug : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" readonly name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Enter Slug.">
                                        @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Upload Event Image : <span class="text-danger">*</span></b></label>
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


                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Event Description : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Event Description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3 p-3">
                                    <table class="table table-bordered p-3" id="dynamicAmenitiesTable">
                                        <thead>
                                            <tr>
                                                <th><b>Uploaded Gallery Image : <span class="text-danger">*</span></b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(old('event_gallery_images'))
                                                @foreach(old('event_gallery_images') as $index => $value)
                                                    <tr>
                                                        <td>
                                                            <input type="file" id="event_gallery_images_{{ $index }}" onchange="previewFiles({{ $index }})" accept=".png, .jpg, .jpeg, .webp" name="event_gallery_images[]" class="form-control @error("event_gallery_images.$index") is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                            <br>
                                                            <div id="preview-event-gallery-container-{{ $index }}" style="display: none;">
                                                                <div id="file-event-gallery-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error("event_gallery_images.$index")
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger removeRow"><b>Remove</b></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>
                                                        <input type="file" id="event_gallery_images_0" onchange="previewFiles(0)" accept=".png, .jpg, .jpeg, .webp" name="event_gallery_images[]" class="form-control @error("event_gallery_images.0") is-invalid @enderror">
                                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                        <br>
                                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                        <br>
                                                        <div id="preview-event-gallery-container-0" style="display: none;">
                                                            <div id="file-event-gallery-preview-0"></div>
                                                        </div>
                                                        @error("event_gallery_images.0")
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="addRow"><b>Add More</b></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('media-details.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'Enter event description here...',
            tabsize: 2,
            height: 100,
        });
    });
</script>

{{-- Select2 JS --}}
<script type="text/javascript">
    $(".myselect").select2();
</script>

{{-- fetch all media event slug --}}
<script>
    $(document).ready(function () {
        $('#media_events_id').on('change', function () {
            var media_events_id = this.value;
            if (media_events_id) {
                $.ajax({
                    url: "{{ route('fetch-media-event-slug') }}",
                    type: "POST",
                    data: {
                        media_events_id: media_events_id,
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

{{-- Image Preview --}}
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

<script>
    $(document).ready(function () {
        let rowId = $('table#dynamicAmenitiesTable tbody tr').length;

        // Add a new row
        $('#addRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="file" id="event_gallery_images_${rowId}" onchange="previewFiles(${rowId}, 'image')" accept=".png, .jpg, .jpeg, .webp" name="event_gallery_images[]" class="form-control">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                        <br>
                        <div id="preview-event-gallery-container-${rowId}" style="display: none;">
                            <div id="file-event-gallery-preview-${rowId}"></div>
                            <small class="text-danger" id="event_gallery_images-error-${rowId}"></small>
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
        const fileInput = document.getElementById(`event_gallery_images_${rowId}`);
        const previewContainer = document.getElementById(`preview-event-gallery-container-${rowId}`);
        const filePreview = document.getElementById(`file-event-gallery-preview-${rowId}`);
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
