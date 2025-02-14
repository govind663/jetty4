@extends('backend.layouts.master')

@section('title')
J4C Group | Edit Client
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Client</h4>
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
                            <a href="{{ route('clients.index') }}">Clients</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Client</li>
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
                        <form method="POST" action="{{ route('clients.update', $client->id) }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="text" id="id" name="id" hidden  value="{{ $client->id }}">

                            <div class="pd-20 card-box mb-30">

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $client->title }}" placeholder="Enter Title">
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
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $client->description }}">{{ $client->description }}</textarea>
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
                                                <th style="width: 80%;"><b>Uploaded Image : <span class="text-danger">*</span></b></th>
                                                <th style="width: 20%;"><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $uploadedImages = json_decode($client->image ?? '[]', true);
                                            @endphp

                                            @if(!empty($uploadedImages))
                                                @foreach($uploadedImages as $index => $image)
                                                    <tr>
                                                        <td>
                                                            <div class="image-preview">
                                                                <img src="{{ asset('/j4c_Group/clients/image/'.$image) }}" alt="Uploaded Image" width="100" height="100" class="img-thumbnail">
                                                                <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            @php $oldImages = old('image', []); @endphp
                                            @if($oldImages)
                                                @foreach($oldImages as $index => $value)
                                                    <tr>
                                                        <td>
                                                            <input type="file" id="image_{{ $index }}" onchange="previewFiles({{ $index }})" accept=".png, .jpg, .jpeg, .webp, .pdf" name="image[]" class="form-control @error('image.$index') is-invalid @enderror">
                                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                                                            <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .pdf files allowed.</b></small><br>
                                                            <div id="preview-container-{{ $index }}" style="display: none;">
                                                                <div id="file-preview-{{ $index }}"></div>
                                                            </div>
                                                            @error('image.$index')
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
                                        <a href="{{ route('clients.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
    function previewFiles(rowId) {
        const fileInput = document.getElementById(`image_${rowId}`);
        const previewContainer = document.getElementById(`preview-container-${rowId}`);
        const filePreview = document.getElementById(`file-preview-${rowId}`);

        if (!fileInput || !previewContainer || !filePreview) return;

        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width:120px; height:100px;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                filePreview.innerHTML = `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="100px" />`;
            } else {
                filePreview.innerHTML = `<p class="text-danger"><b>Unsupported file type!</b></p>
                                         <p class="text-danger"><b>Please select a valid image or PDF file.</b></p>`;
            }

            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    }

    $(document).ready(function () {
        let rowId = $("input[name='image[]']").length || 0; // Ensure unique row IDs

        $('#addAmenitiesRow').click(function () {
            rowId++; // Increment to avoid duplicate IDs
            let newRow = `
                <tr>
                    <td>
                        <input type="file" id="image_${rowId}" onchange="previewFiles(${rowId})" accept=".png, .jpg, .jpeg, .webp, .pdf" name="image[]" class="form-control">
                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small><br>
                        <small class="text-secondary"><b>Note: Only .jpg, .jpeg, .png, .webp, .pdf files allowed.</b></small><br>
                        <div id="preview-container-${rowId}" style="display: none;">
                            <div id="file-preview-${rowId}"></div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRow"><b>Remove</b></button>
                    </td>
                </tr>`;
            $('#dynamicAmenitiesTable tbody').append(newRow);
        });

        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

@endpush
