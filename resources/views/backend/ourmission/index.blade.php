@extends('backend.layouts.master')

@section('title')
    J4C Group | Manage Our Mission
@endsection

@push('styles')
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Manage Our Mission </h4>
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
                            <li class="breadcrumb-item active">Manage Our Mission  </li>
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
                                <h4>All Our Mission  List</h4>
                            </div>
                            {{-- Add Team Button --}}
                            <a href="{{ route('our-mission.create') }}" class="btn btn-primary">
                                <b>
                                    <i class="fa fa-plus"></i>
                                    Our Mission
                                </b>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Image</th>
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ourmission as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>

                                                <td class="text-wrap text-justify">
                                                    @if($value->image)
                                                        <img src="{{ asset('/j4c_Group/our-mission/image/' . $value->image) }}" alt="Banner Image" style="width: 100%; height: 100px;">
                                                    @endif
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    @if($value->icon)
                                                        <img src="{{ asset('/j4c_Group/our-mission/icon/' . $value->icon) }}" alt="Banner Image" style="width: 100%; height: 100px;">
                                                    @endif
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {{ $value->title ?? '' }}
                                                </td>

                                                <td class="text-wrap text-justify">
                                                    {!! $value->description !!}
                                                </td>

                                                <td>
                                                    <a href="{{ route('our-mission.edit', $value->id) }}">
                                                        <button class="btn btn-primary btn-sm">
                                                            <b>
                                                                <i class="icon-pencil-alt"></i>
                                                                {{-- Edit --}}
                                                            </b>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('our-mission.destroy', $value->id) }}" method="post">
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
