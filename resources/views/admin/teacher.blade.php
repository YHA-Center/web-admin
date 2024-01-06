@extends('admin.master.master')

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm bg-white" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Data Table > Instructor  --}}
        <div class="fs-4 text-bolder mb-2">Instructors</div>
        <div class="row mb-2">
            {{-- Data Table  --}}
            @if (count($teachers) > 0)
                <div class="col-12">
                    <div class="table-responsive text-nowrap bg-light rounded shadow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>#{{ $teacher->id }}</td>
                                        <td>
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                    title="{{ $teacher->name }}">
                                                    <img src="{{ asset('storage/' . $teacher->image) }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->age }}</td>
                                        <td>{{ $teacher->position }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('teacher.edit', $teacher->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('teacher.delete', $teacher->id) }}"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="fs-6 text-uppercase text-center my-4">No instructor!</div>
            @endif
        </div>
        {{-- Pagination  --}}
        {{ $teachers->appends(request()->query())->links() }}
        {{-- Button  --}}
        <a href="{{ route('teacher.createPage') }}" class="btn btn-primary mb-5"> <i class="bx bx-plus"></i> Instructor
        </a>

        <div class="fs-4 text-bolder mb-2">Position</div>
        {{-- Data Table > Position  --}}
        <div class="row mb-2">
            <div class="col-6">
                @if (count($teachers) > 0)
                    <div class="table-responsive text-nowrap bg-light shadow rounded">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>#{{ $teacher->id }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('teacher.edit', $teacher->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('teacher.delete', $teacher->id) }}"><i
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
                    <div class="fs-6 text-uppercase text-center my-4">No Position!</div>
                @endif
            </div>
        </div>
        {{-- Pagination  --}}
        {{ $teachers->appends(request()->query())->links() }}
        {{-- Button  --}}
        <a href="{{ route('teacher.createPage') }}" class="btn btn-primary mb-5"> <i class="bx bx-plus"></i> Position </a>

    </div>
@endsection
