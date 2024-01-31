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
            <div class="fs-4 mb-4"> <i class="bx bx-image fs-3 mb-1"></i>Gallery</div>

            <div class="col-12 mb-5">
                @if (count($gallerys) > 0)
                    <div class="table-responsive text-nowrap bg-light rounded shadow mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-5">Image</th>
                                    <th class="col-4">Name</th>
                                    <th class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($gallerys as $data)
                                    {{-- {{ dd($timetables->toArray()) }} --}}
                                    <tr>
                                        <td>#{{ $data->id }}</td>
                                        <td> 
                                            <img src="{{ asset('storage/'.$data->image) }}" alt="" width="100">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('gallery.edit', $data->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('gallery.delete', $data->id) }}"><i
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
                {{ $gallerys->links() }}
                <a style="background-color: #ff6c0f; color:white;" href="{{ route('gallery.createPage') }}" class="btn mb-5 d-inline"> <i
                        class="bx bx-plus"></i> Gallery</a>
            </div>

        </div>
    </div>
@endsection

