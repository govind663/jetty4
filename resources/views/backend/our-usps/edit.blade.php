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
                                    <div class="d-flex justify-content-end mb-2">
                                        <button type="button" class="btn btn-primary" id="addAmenitiesRow"><b>Add More</b></button>
                                    </div>
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
                                            @php
                                                $banners = json_decode($ourUsp->baner_image, true) ?? [];
                                                $icons = json_decode($ourUsp->banner_icon, true) ?? [];
                                                $titles = json_decode($ourUsp->banner_title, true) ?? [];
                                                $descriptions = json_decode($ourUsp->banner_description, true) ?? [];
                                                $oldImages = old('banner_image', []);
                                            @endphp

                                            {{-- Display Existing Banner Images --}}
                                            @if(!empty($banners))
                                                @foreach($banners as $index => $image)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('/j4c_Group/our_usp/banner_image/' . $image) }}" alt="Uploaded Banner Image" width="250" height="40px" class="img-thumbnail">
                                                            <input type="hidden" name="existing_banner_image[]" value="{{ $image }}">
                                                        </td>
                                                        <td>
                                                            <img src="{{ asset('/j4c_Group/our_usp/banner_icon/' . ($icons[$index] ?? '')) }}" alt="Uploaded Banner Icon" width="100" height="100" class="img-thumbnail">
                                                            <input type="hidden" name="existing_banner_icon[]" value="{{ $icons[$index] ?? '' }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="banner_title[]" value="{{ old('banner_title.' . $index, $titles[$index] ?? '') }}" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <textarea type="text" name="banner_description[]" value="{{ old('banner_description.' . $index, $descriptions[$index] ?? '') }}" class="form-control" readonly>{{ old('banner_description.' . $index, $descriptions[$index] ?? '') }}</textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger removeRow"><b>Remove</b></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            {{-- Display Newly Uploaded Images --}}
                                            @if($oldImages)
                                                @foreach($oldImages as $index => $value)
                                                    <tr>
                                                        <td>
                                                            <input type="file" id="banner_image_{{ $index }}" onchange="previewFiles({{ $index }})" accept=".png, .jpg, .jpeg, .webp, .pdf" name="banner_image[]" class="form-control @error('banner_image.' . $index) is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                            <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .pdf files allowed.</b></small><br>
                                                            <div id="preview-container-{{ $index }}" style="display: none;">
                                                                <div id="file-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error('banner_image.' . $index)
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="file" name="banner_icon[]" accept=".png, .jpg, .jpeg, .webp" class="form-control @error('banner_icon.' . $index) is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                            <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp files allowed.</b></small><br>
                                                            <div id="icon-preview-container-{{ $index }}" style="display: none;">
                                                                <div id="icon-file-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error('banner_icon.' . $index)
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" name="banner_title[]" class="form-control @error('banner_title.' . $index) is-invalid @enderror" placeholder="Enter Banner Title">
                                                            @error('banner_title.' . $index)
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <textarea type="text" name="banner_description[]" class="form-control @error('banner_description.' . $index) is-invalid @enderror" placeholder="Enter Banner Description"></textarea>
                                                            @error('banner_description.' . $index)
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
        $('#addAmenitiesRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="file" id="banner_image_${rowId}" onchange="previewFiles(${rowId}, 'image')" accept=".png, .jpg, .jpeg, .webp" name="banner_image[]" class="form-control">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                        <br>
                        <div id="preview-container-${rowId}" style="display: none;">
                            <div id="file-preview-${rowId}"></div>
                            <small class="text-danger" id="ibanner_image-error-${rowId}"></small>
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
                        <textarea type="text" id="banner_description_${rowId}" name="banner_description[]" class="form-control"></textarea>
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
