@extends('backend.layouts.master')

@section('title')
J4C Group | Edit About Sustainability
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit About Sustainability</h4>
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
                            <a href="{{ route('about-sustainability.index') }}">About Sustainability</a>
                        </li>
                        <li class="breadcrumb-item active">Edit About Sustainability</li>
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
                        <form method="POST" action="{{ route('about-sustainability.update', $aboutSustainability->id) }}" id="update_construction_solutions_form') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="text" id="id" name="id" hidden  value="{{ $aboutSustainability->id }}">

                            <div class="pd-20 card-box mb-30">

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $aboutSustainability->title }}" placeholder="Enter Title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2"><b>Upload Image : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .webp" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $aboutSustainability->image }}" placeholder="Upload Image.">
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
                                        @if(!empty($aboutSustainability->image))
                                            <img src="{{ asset('/j4c_Group/about_sustainability/image/' . $aboutSustainability->image) }}" alt="Banner Image" style="width: auto; height: 200px;">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Description : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $aboutSustainability->description }}">{{ $aboutSustainability->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-sm-2"><b>Other Description : <span class="text-danger">*</span></b></label>
                                    <div class="col-sm-10 col-md-10">
                                        <textarea name="other_description" id="other_description" class="form-control @error('other_description') is-invalid @enderror" placeholder="Enter Description" value="{{ $aboutSustainability->other_description }}">{{ $aboutSustainability->other_description }}</textarea>
                                        @error('other_description')
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
                                                <th><b>Solution Name : <span class="text-danger">*</span></b></th>
                                                <th><b>Solution Description : <span class="text-danger">*</span></b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($pillers_title))
                                                @foreach($pillers_title as $index => $solution)
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="pillers_title[]" value="{{ $solution }}" class="form-control @error("pillers_title.$index") is-invalid @enderror" placeholder="Enter Solution Name">
                                                            @error("pillers_title.$index")
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </td>

                                                        <td>
                                                            <textarea name="pillers_description[]" class="form-control @error("pillers_description.$index") is-invalid @enderror" placeholder="Enter Solution Description" value="{{ $pillers_description[$index] ?? '' }}">{{ $pillers_description[$index] ?? '' }}</textarea>
                                                            @error("pillers_description.$index")
                                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </td>

                                                        <td>
                                                            @if($loop->first)
                                                                <button type="button" class="btn btn-primary" id="addAmenitiesRow"><b>Add More</b></button>
                                                            @else
                                                                <button type="button" class="btn btn-danger removeAmenitiesRow"><b>Remove</b></button>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>
                                                        <input type="text" name="pillers_title[]" class="form-control @error('pillers_title.0') is-invalid @enderror" placeholder="Enter Solution Name">
                                                        @error('pillers_title.0')
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <textarea name="pillers_description[]" class="form-control @error('pillers_description.0') is-invalid @enderror" placeholder="Enter Solution Description"></textarea>
                                                        @error('pillers_description.0')
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="addAmenitiesRow"><b>Add More</b></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('about-sustainability.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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
{{-- Jquery  --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

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
        let rowId = {{ count($pillers_title ?? []) }}; // Start from existing count

        // Add a new row
        $('#addAmenitiesRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="text" name="pillers_title[]" class="form-control" placeholder="Enter Solution Name">
                    </td>

                    <td>
                        <textarea name="pillers_description[]" class="form-control" placeholder="Enter Solution Description"></textarea>
                    </td>

                    <td>
                        <button type="button" class="btn btn-danger removeAmenitiesRow"><b>Remove</b></button>
                    </td>
                </tr>`;
            $('#dynamicAmenitiesTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeAmenitiesRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

@endpush
