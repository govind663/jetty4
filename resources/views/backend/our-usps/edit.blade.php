@extends('backend.layouts.master')

@section('title')
J4C Group | Edit About J4C USP
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit About J4C USP</h4>
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
                            <a href="{{ route('our-usp.index') }}">About J4C USP</a>
                        </li>
                        <li class="breadcrumb-item active">Edit About J4C USP</li>
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
                        <form method="POST" action="{{ route('our-usp.update', $ourUsp->id) }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="text" id="id" name="id" hidden  value="{{ $ourUsp->id }}">

                            <div class="pd-20 card-box mb-30">

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $ourUsp->title }}" placeholder="Enter Title">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Description : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $ourUsp->description }}">{{ $ourUsp->description }}</textarea>
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
                                                <th><b>Uploaded Banner Image : <span class="text-danger">*</span></b></th>
                                                <th><b>Uploaded Banner Icon : <span class="text-danger">*</span></b></th>
                                                <th><b>Banner Title : <span class="text-danger">*</span></b></th>
                                                <th><b>Banner Description : <span class="text-danger">*</span></b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(old('banner_image'))
                                                @foreach(old('banner_image') as $index => $value)
                                                    <tr>
                                                        <td>
                                                            <input type="file" id="banner_image_{{ $index }}" onchange="previewFiles({{ $index }})" accept=".png, .jpg, .jpeg, .webp" name="banner_image[]" class="form-control @error("banner_image.$index") is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                            <br>
                                                            <div id="preview-container-{{ $index }}" style="display: none;">
                                                                <div id="file-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error("banner_image.$index")
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="file" id="banner_icon_{{ $index }}" onchange="previewIconFiles({{ $index }})" accept=".png, .jpg, .jpeg, .webp" name="banner_icon[]" class="form-control @error("banner_icon.$index") is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                            <br>
                                                            <div id="icon-preview-container-{{ $index }}" style="display: none;">
                                                                <div id="icon-file-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error("banner_icon.$index")
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" id="banner_title_{{ $index }}" name="banner_title[]" value="{{ old("banner_title.$index") }}" class="form-control @error("banner_title.$index") is-invalid @enderror">
                                                            @error("banner_title.$index")
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" id="banner_description_{{ $index }}" name="banner_description[]" value="{{ old("banner_description.$index") }}" class="form-control @error("banner_description.$index") is-invalid @enderror">
                                                            @error("banner_description.$index")
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
                                                        <input type="file" id="banner_image_0" onchange="previewFiles(0)" accept=".png, .jpg, .jpeg, .webp" name="banner_image[]" class="form-control @error("banner_image.0") is-invalid @enderror">
                                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                        <br>
                                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                        <br>
                                                        <div id="preview-container-0" style="display: none;">
                                                            <div id="file-preview-0"></div>
                                                        </div>
                                                        @error("banner_image.0")
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="file" id="banner_icon_0" onchange="previewIconFiles(0)" accept=".png, .jpg, .jpeg, .webp" name="banner_icon[]" value="{{ old("banner_icon.0") }}" class="form-control @error("banner_icon.0") is-invalid @enderror">
                                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                                        <br>
                                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                        <br>
                                                        <div id="icon-preview-container-0" style="display: none;">
                                                            <div id="icon-file-preview-0"></div>
                                                        </div>
                                                        @error("banner_icon.0")
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" id="banner_title_0" name="banner_title[]" value="{{ old("banner_title.0") }}" class="form-control  @error("banner_title.0") is-invalid @enderror">
                                                        @error("banner_title.0")
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" id="banner_description_0" name="banner_description[]" value="{{ old("banner_description.0") }}" class="form-control  @error("banner_description.0") is-invalid @enderror">
                                                        @error("banner_description.0")
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
                                        <a href="{{ route('our-usp.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
            placeholder: 'Enter your description here...',
            tabsize: 2,
            height: 100,
        });
    });
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
                        <input type="file" id="banner_image_${rowId}" onchange="previewFiles(${rowId}, 'image')" accept=".png, .jpg, .jpeg, .webp" name="banner_image[]" class="form-control">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                        <br>
                        <div id="image-preview-container-${rowId}" style="display: none;">
                            <div id="image-file-preview-${rowId}"></div>
                            <small class="text-danger" id="image-error-${rowId}"></small>
                        </div>
                    </td>
                    <td>
                        <input type="file" id="banner_icon_${rowId}" onchange="previewIconFiles(${rowId}, 'icon')" accept=".png, .jpg, .jpeg, .webp" name="banner_icon[]" class="form-control">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                        <br>
                        <div id="icon-preview-container-${rowId}" style="display: none;">
                            <div id="icon-file-preview-${rowId}"></div>
                            <small class="text-danger" id="icon-error-${rowId}"></small>
                        </div>
                    </td>
                    <td>
                        <input type="text" id="banner_title_${rowId}" name="banner_title[]" class="form-control">
                    </td>
                    <td>
                        <input type="text" id="banner_description_${rowId}" name="banner_description[]" class="form-control">
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

    // Preview banner_image
    function previewFiles(rowId) {
        const fileInput = document.getElementById(`banner_image_${rowId}`);
        const previewContainer = document.getElementById(`preview-container-${rowId}`);
        const filePreview = document.getElementById(`file-preview-${rowId}`);
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

    // Preview banner_icon
    function previewIconFiles(rowId) {
        const fileInput = document.getElementById(`banner_icon_${rowId}`);
        const previewContainer = document.getElementById(`icon-preview-container-${rowId}`);
        const filePreview = document.getElementById(`icon-file-preview-${rowId}`);
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
