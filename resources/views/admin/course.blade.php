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
                    @if (count($classes) > 0)
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

                            {{-- Data Table  --}}
                            <tbody class="table-border-bottom-0">
                                @foreach ($classes as $class)
                                    <tr>
                                        <td>#{{ $class->id }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->duration }} hr</td>
                                        <td class="w-25">
                                            {{-- List of Instructors --}}
                                            @foreach ($class->subjects as $subject)
                                                <div class="rounded-pill d-inline text-white py-1 px-2 mx-1" 
                                                style=" 
                                                    background-color: rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 0.8);
                                                ">
                                                    {{ $subject->name }}    
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                {{-- List of Teachers (Distinct) for each class --}}
                                                @php
                                                    $distinctTeachers = collect();
                                        
                                                    foreach ($class->subjects as $subject) {
                                                        $distinctTeachers = $distinctTeachers->merge($subject->teachers);
                                                    }
                                        
                                                    $distinctTeachers = $distinctTeachers->unique('id');
                                                @endphp
                                        
                                                @foreach ($distinctTeachers as $teacher)
                                                    <a href="{{ route('teacher.edit', $teacher->id) }}">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                            title="{{ $teacher->name }}">
                                                            <img src="{{ asset('storage/' . $teacher->image) }}" alt="Avatar"
                                                                class="rounded-circle shadow" />
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                            
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="{{ route('class.delete', $class->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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
                    {{ $courses->appends(['subject' => $subjects->currentPage()])->links() }}
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
                    {{ $subjects->appends(['course' => $courses->currentPage()])->links() }}
                    <a href="{{ route('subject.createPage') }}" class="btn btn-primary mb-4"> <i class="bx bx-plus"></i>Subject</a>
                </div>
            </div>

    </main>
@endsection
