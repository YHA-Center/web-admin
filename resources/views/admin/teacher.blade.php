@extends('admin.master.master')

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Instructor Data Table  --}}
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
                                                <a href="{{ route('teacher.edit', $teacher->id) }}">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                    title="{{ $teacher->name }}">
                                                    <img src="{{ asset('storage/' . $teacher->image) }}" alt="Avatar"
                                                        class="rounded-circle" />
                                                    </li>
                                                </a>
                                            </ul>
                                        </td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->age }} yrs</td>
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
                <div class="fs-6 text-uppercase text-center my-4">No Record!</div>
            @endif
        </div>
        {{-- Pagination  --}}
        {{ $teachers->appends(['position' => $positions->currentPage(), 'teach' => $teaches->currentPage()])->links() }}
        {{-- Button  --}}
        <a style="background-color: #ff6c0f; color:white;" href="{{ route('teacher.createPage') }}" class="btn mb-5"> <i class="bx bx-plus"></i> Instructor
        </a>



        {{-- Section  --}}
        <div class="row mb-2">



            
            {{-- Position Table  --}}
            <div class="col-md-6">
                <div class="fs-4 text-bolder mb-2">Position</div>
                @if (count($positions) > 0)
                    <div class="table-responsive text-nowrap bg-light shadow rounded my-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($positions as $position)
                                    <tr>
                                        <td>#{{ $position->id }}</td>
                                        <td>{{ $position->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('position.edit', $position->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('position.delete', $position->id) }}"><i
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
                {{-- Pagination  --}}
                {{ $positions->appends(['teacher' => $teachers->currentPage(), 'teach' => $teaches->currentPage()])->links() }}
                {{-- Button  --}}
                <a style="background-color: #ff6c0f; color:white;" href="{{ route('position.createPage') }}" class="btn mb-5"> <i class="bx bx-plus"></i> Position </a>
            </div>




            {{-- Teach Table  --}}
            <div class="col-md-6">
                <div class="fs-4 text-bolder mb-2">Teach</div>
                @if (count($teaches) > 0)
                    <div class="table-responsive text-nowrap bg-light shadow rounded my-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Instructor</th>
                                    <th>Subjects</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($teaches as $teach)
                                    <tr>
                                        <td>#{{ $teach->id }}</td>
                                        <td>{{ $teach->name }}</td>
                                        <td>
                                            @foreach ($teach->subjects as $item)
                                                <div class="rounded-pill d-inline text-white py-1 px-2 mx-1" 
                                                style=" 
                                                    background-color: rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 0.8);
                                                ">
                                                    {{ $item->name }}    
                                                </div>                                            
                                            @endforeach 
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('teach.edit', $teach->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('teach.delete', $teach->id) }}"><i
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
                {{-- Pagination  --}}
                {{ $teaches->appends(['teacher' => $teachers->currentPage(), 'position' => $positions->currentPage()])->links() }}
                {{-- Button  --}}
                <a style="background-color: #ff6c0f; color:white;" href="{{ route('teach.createPage') }}" class="btn mb-5"> <i class="bx bx-plus"></i> Teach </a>
            </div>



        </div>
        


    </div>
@endsection
