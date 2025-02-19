@extends('backend.layouts.master')

@section('title')
    J4C Group | Manaage Current Opening
@endsection

@push('styles')
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Manaage Current Opening</h4>
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
                            <li class="breadcrumb-item active">Manaage Current Opening</li>
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
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <div class="card-header pb-0 card-no-border">
                                <h4>All Current Opening List</h4>
                            </div>
                            {{-- Add Current Opening Button --}}
                            <a href="{{ route('current-opening.create') }}" class="btn btn-primary">
                                <b>
                                    <i class="fa fa-plus"></i>
                                    Current Opening
                                </b>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Designation</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Document</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($current_openings as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>


                                                <td class="text-wrap text-justify">
                                                    {{ $value->designation }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->location }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {!! $value->description !!}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    @if($value->document_file)
                                                        <a href="{{ asset('/j4c_Group/current_opening/image/'.$value->document_file) }}" target="_blank" class="btn btn-primary btn-sm">
                                                            View Document
                                                        </a>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('current-opening.edit', $value->id) }}">
                                                        <button class="btn btn-primary btn-sm">
                                                            <b>
                                                                <i class="icon-pencil-alt"></i>
                                                                Edit
                                                            </b>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('current-opening.destroy', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                                            <b>
                                                                <i class="icon-trash"></i>
                                                                Delete
                                                            </b>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@push('scripts')
@endpush
