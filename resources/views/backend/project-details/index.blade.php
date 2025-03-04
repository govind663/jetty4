@extends('backend.layouts.master')

@section('title')
    J4C Group | Manaage Project Details
@endsection

@push('styles')
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Manaage Project Details </h4>
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
                            <li class="breadcrumb-item active">Manaage Project Details  </li>
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
                                <h4>All Project Details  List</h4>
                            </div>
                            {{-- Add Team Button --}}
                            <a href="{{ route('project-details.create') }}" class="btn btn-primary">
                                <b>
                                    <i class="fa fa-plus"></i>
                                    Project Details
                                </b>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Project Name</th>
                                            <th>Built up Area</th>
                                            <th>IT Load</th>
                                            <th>Developers</th>
                                            <th>Client Name</th>
                                            <th>Structural Consultant</th>
                                            <th>Architect</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projectDetails as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->projectName?->project_name ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->built_up_area ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->it_load ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->developers ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->client_name ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->structural_consultant ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->architect ?? '' }}
                                                </td>

                                                <td>
                                                    <a href="{{ route('project-details.edit', $value->id) }}">
                                                        <button class="btn btn-primary btn-sm">
                                                            <b>
                                                                <i class="icon-pencil-alt"></i>
                                                                {{-- Edit --}}
                                                            </b>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('project-details.destroy', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                                            <b>
                                                                <i class="icon-trash"></i>
                                                                {{-- Delete --}}
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
