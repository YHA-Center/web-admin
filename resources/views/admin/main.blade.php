@extends('admin.master.master')

@section('content')

    {{-- alert section  --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm bg-white" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif




    {{-- Welcome section  --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                {{-- Card  --}}
                <div class="card shadow mb-2">
                    <div class="card-header">
                        <div class="fs-4 fw-bolder text-uppercase">Welcome Page</div>
                    </div>
                    <div class="card-body">
                        {{-- Table Start  --}}
                        @if (count($welcome) != 0)
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Image Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($welcome as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $data->image) }}" alt=""
                                                        class="" width="100">
                                                </td>
                                                <td>
                                                    {{ $data->image }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('welcome.edit', $data->id) }}"><i
                                                                    class="bx bx-edit-alt me-2"></i> Edit</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('welcome.delete', $data->id) }}"><i
                                                                    class="bx bx-trash me-2"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="fs-5 text-center">No image</div>
                        @endif
                    </div>
                </div>
                {{-- Pagination  --}}
                {{ $welcome->appends(request()->query())->links() }}
                {{-- Button  --}}
                <a href="{{ route('welcome.create') }}" class="btn btn-primary btn-sm-sm"> <i class="bx bx-plus"></i>Add
                    Image</a>
            </div>
        </div>
    </div>




    {{-- About Page Section  --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow mb-2">
                    <div class="card-header">
                        <div class="fs-4 fw-bolder text-uppercase">About Page</div>
                    </div>
                    <div class="card-body">
                        {{-- Table Start  --}}
                        @if (count($about) != 0)
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Image Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($about as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $data->image) }}" alt=""
                                                        class="" width="100">
                                                </td>
                                                <td>
                                                    {{ $data->image }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('about.edit', $data->id) }}"><i
                                                                    class="bx bx-edit-alt me-2"></i> Edit</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('about.delete', $data->id) }}"><i
                                                                    class="bx bx-trash me-2"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="fs-5 text-center">No image</div>
                        @endif
                    </div>
                </div>
                {{-- Button  --}}
                @if (count($about) < 3)
                    <a href="{{ route('about.post') }}" class="btn btn-primary btn-sm-sm"> <i class="bx bx-plus "></i>Add
                        Image</a>
                @endif
            </div>
            {{-- About Description --}}
            <div class="col-lg-4">
                <div class="card shadow mb-2">
                    <div class="card-header">
                        <div class="fs-4 fw-bolder text-uppercase">Who we are?</div>
                    </div>
                    <div class="card-body">
                        <textarea style="resize: none;" class="form-control" rows="10" readonly>{{ $about_desc->desc }}</textarea>
                    </div>
                </div>
                <a href="{{ route('about.desc.edit', $about_desc->id) }}" class="btn btn-primary w-25 mb-4">
                    <i class="bx bx-edit-alt"></i> Edit
                </a>
            </div>
        </div>
    </div>
    {{-- END OF ABOUT PAGE SECTION  --}}





    {{-- Project section  --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col">
                This is welcome page
            </div>
        </div>
    </div>


@endsection
