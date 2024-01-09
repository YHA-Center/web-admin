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
        <div class="fs-4 text-bolder mb-2">Section</div>
        <div class="row mb-2">


            {{-- Data Table  --}}
            @if (count($sections) > 0)
                <div class="col-md-6">
                    <div class="table-responsive text-nowrap bg-light rounded shadow">
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
                                                        href="{{ route('section.edit') }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('section.delete') }}"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="fs-6 text-uppercase text-center my-4">No Record!</div>
            @endif
            {{-- Pagination  --}}
            {{-- {{ $teachers->appends(['section' => $positions->currentPage()])->links() }} --}}
            {{-- Button  --}}
            <a href="{{ route('section.createPage') }}" class="btn btn-primary mb-5"> <i class="bx bx-plus"></i> Section</a>

            

        </div>
        
        


    </div>
@endsection
