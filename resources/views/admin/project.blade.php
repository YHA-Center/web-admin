@extends('admin.master.master')

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Section Data Table  --}}
        {{-- Section  --}}
        <div class="row mb-2">

            {{-- Class Section  --}}
            <div class="fs-4 mb-4"> <i class="bx bx-folder fs-3 mb-1"></i>Projects</div>

            <div class="col-12 mb-5">
                @if (count($projects) > 0)
                    <div class="table-responsive text-nowrap bg-light rounded shadow mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Links</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($projects as $data)
                                    {{-- {{ dd($timetables->toArray()) }} --}}
                                    <tr>
                                        <td> #{{ $data->id }} </td>
                                        <td> 
                                            <img src="{{ asset('storage/'.$data->image) }}" alt="" width="70">
                                        </td>
                                        <td> {{ $data->title }} </td>
                                        <td> {{ $data->course }} </td>
                                        <td>
                                            @if ($data->demo || $data->github)
                                                @if($data->github)
                                                    <a href="{{ $data->github }}" class="btn btn-sm btn-secondary" target="_blank"> <i class="bx bxl-github me-1 fs-3"></i> Code </a>
                                                @endif
                                                @if($data->demo)
                                                    <a href="{{ $data->demo }}" class="btn btn-sm btn-primary" target="_blank"> <i class="bx bx-play-circle me-1 fs-3" title="Demo"></i> Demo </a>
                                                @endif
                                            @else
                                                <span class="text-muted">None</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('project.edit', $data->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('project.delete', $data->id) }}"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="fs-6 text-uppercase text-center my-4">No Record!</div>
                @endif
                {{ $projects->links() }}
                <a href="{{ route('project.createPage') }}" class="btn btn-primary mb-5 d-inline"> <i
                        class="bx bx-plus"></i> Add Project</a>
            </div>

        </div>
    </div>
@endsection

