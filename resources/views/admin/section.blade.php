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
            <div class="fs-4 mb-2"> <i class="bx bx-calendar-event fs-3 mb-1"></i> Class Section</div>

            <div class="col-12 mb-5">

                <div class="table-responsive text-nowrap bg-light rounded shadow mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            {{-- @foreach ($section as $teacher) --}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href=""><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item"
                                                    href=""><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('section.createPage') }}" class="btn btn-primary mb-5 d-inline"> <i class="bx bx-plus"></i> Class Section</a>
            </div>


            {{-- Section Table  --}}
            <div class="col-md-6">
            <span class="fs-4"> <i class="bx bx-hourglass fs-4 mb-1"></i> Section</span>
            @if (count($sections) > 0)                
                <div class="table-responsive text-nowrap bg-light rounded shadow mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($sections as $section)
                                <tr>
                                    <td>#{{ $section->id }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start)->format('h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end)->format('h:i A') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('section.edit', $section->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('section.delete', $section->id) }}"><i
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
            {{-- {{ $teachers->appends(['section' => $positions->currentPage()])->links() }} --}}
            {{-- Button  --}}
            <a href="{{ route('section.createPage') }}" class="btn btn-primary mb-5 d-inline"> <i class="bx bx-plus"></i> Section</a>
            </div>
            

        </div>
        
        


    </div>
@endsection
