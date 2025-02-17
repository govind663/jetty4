@extends('backend.layouts.master')

@section('title')
    J4C Group | Add Statistics
@endsection

@push('styles')
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add Statistics</h4>
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
                                <a href="{{ route('statistics.index') }}">Statistics</a>
                            </li>
                            <li class="breadcrumb-item active">Add Statistics</li>
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
                            <form method="POST" action="{{ route('statistics.update', $statistics->id) }}" class="form-horizontal" id="update_statistics_form') }}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <input type="text" id="id" name="id" hidden  value="{{ $statistics->id }}">

                                <div class="pd-20 card-box mb-30">

                                    <div class="form-group row mt-3">
                                        <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $statistics->title }}" placeholder="Enter Title">
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
                                                    <option value="1" {{ $statistics->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{ $statistics->status == '2' ? 'selected' : '' }}>Inactive</option>
                                                </optgroup>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label class="col-sm-2"><b>Description : <span class="text-danger">*</span></b></label>
                                        <div class="col-sm-4 col-md-4">
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ $statistics->description }}">{{ $statistics->description }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-md-3"></label>
                                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                            <a href="{{ route('statistics.index') }}" class="btn btn-danger"><b>Cancel</b></a>&nbsp;&nbsp;
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

{{-- <script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'Enter your description here...',
            tabsize: 2,
            height: 100,
        });
    });
</script> --}}
@endpush
