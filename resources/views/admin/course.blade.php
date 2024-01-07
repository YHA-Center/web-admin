@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            {{-- Message Box  --}}
            <div class="row">
                <div class="col">
                    @if (session('success'))
                        <div class="alert-message">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- Class List  --}}
            <div class="row mb-2">
                <h4> <i class="bx bx-book-bookmark fs-3"></i> Class</h4>
                <div class="col-12">
                    @if ($classes->count() > 0)
                    <div class="table-responsive text-nowrap bg-light shadow rounded">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course</th>
                                    <th>Duration</th>
                                    <th>Subjects</th>
                                    <th>Instructor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($classes as $class)
                                    <tr>
                                        <td>#{{ $class->id }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->duration }}</td>
                                        <td>{{ Str::of($class->description)->limit(50) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('course.edit', $class->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('course.delete', $class->id) }}"><i
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
                        <h6 class="text-center text-secondary mt-3 text-uppercase">No Class</h6>
                    @endif
                </div>
            </div>
            {{-- Pagination  --}}
            {{-- {{ $classes->appends(request()->query())->links() }} --}}
            <a href="{{ route('class.createPage') }}" class="btn btn-primary mb-5"> <i class="bx bx-plus"></i>Class</a>


            {{-- Course List & Subjec List  --}}
            <div class="row mb-2">
                {{-- Course  --}}
                <div class="col-md-8 mb-2">
                    <h4> <i class="bx bx-book-alt fs-3"></i> Course</h4>
                    @if (count($courses) > 0)
                    <div class="table-responsive text-nowrap bg-light shadow rounded mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>#{{ $course->id }}</td>
                                        <td>{{ Str::of($course->name)->limit(20) }}</td>
                                        <td>{{ $course->duration }} min</td>
                                        <td>{{ Str::of($course->description)->limit(30) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('course.edit', $course->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('course.delete', $course->id) }}"><i
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
                        <h6 class="text-center text-secondary mt-3 text-uppercase">No Course</h6>
                    @endif
                    {{-- Pagination  --}}
                    {{ $courses->appends(request()->query())->links() }}
                    <a href="{{ route('course.createPage') }}" class="btn btn-primary mb-4"> <i class="bx bx-plus"></i>Course</a>
                </div>

                {{-- Subject  --}}
                <div class="col-md-4 mb-2">
                    <h4> <i class="bx bx-book-open fs-3"></i> Subject</h4>
                    @if (count($subjects) > 0)
                    <div class="table-responsive text-nowrap bg-light shadow rounded mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>#{{ $subject->id }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('subject.edit', $subject->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('subject.delete', $subject->id) }}"><i
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
                        <h6 class="text-center text-secondary mt-3 text-uppercase">No Subject</h6>
                    @endif
                    {{-- Pagination  --}}
                    {{ $subjects->appends(request()->query())->links() }}
                    <a href="{{ route('subject.createPage') }}" class="btn btn-primary mb-4"> <i class="bx bx-plus"></i>Subject</a>
                </div>
            </div>

    </main>
@endsection
