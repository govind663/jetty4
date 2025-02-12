@extends('backend.layouts.master')

@section('title')
J4C Group | Add Construction Solutions
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Add Construction Solutions</h4>
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
                            <a href="{{ route('construction-solutions.index') }}">Construction Solutions</a>
                        </li>
                        <li class="breadcrumb-item active">Add Construction Solutions</li>
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
                        <form method="POST" action="{{ route('construction-solutions.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="pd-20 card-box mb-30">

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Title">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Upload Image : <span class="text-danger">*</span></b></label>
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
                                    <table class="table table-bordered p-3"  id="dynamicAmenitiesTable">
                                        <thead>
                                            <tr>
                                                <th>Solution Name : <span class="text-danger">*</span></th>
                                                <th>Solution Description : <span class="text-danger">*</span></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>      
                                                <td>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="text" name="solution_name[]" id="solution_name_0" class="form-control @error('solution_name.*') is-invalid @enderror" placeholder="Enter Solution Name">
                                                        @error('solution_name.*')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="text" name="solution_description[]" id="solution_description_0" class="form-control @error('solution_description.*') is-invalid @enderror" placeholder="Enter Solution Name">
                                                        @error('solution_description.*')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="addAmenitiesRow">Add More</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('construction-solutions.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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

{{-- Add More Solution Details --}}
<script>
    $(document).ready(function () {
        let rowId = 0;

        // Add a new row
        $('#addAmenitiesRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="text" name="solution_name[]" id="solution_name_${rowId}" class="form-control @error('solution_name.*') is-invalid @enderror" placeholder="Enter Solution Name">
                            @error('solution_name.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>

                    <td>
                        <div class="col-sm-12 col-md-12">
                            <input type="text" name="solution_description[]" id="solution_description_${rowId}" class="form-control @error('solution_description.*') is-invalid @enderror" placeholder="Enter Solution Name">
                            @error('solution_description.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-danger removeAmenitiesRow">Remove</button></td>
                </tr>`;
            $('#dynamicAmenitiesTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeAmenitiesRow', function () {
            $(this).closest('tr').remove();
        });
    });

</script>
@endpus