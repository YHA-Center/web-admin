@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.section') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i>
                        Back</a>

                    <div class="card my-3 border-warning shadow">
                        {{-- Card Header  --}}
                        <div class="card-header border-warning">
                            <h3 class="h4 text-primary text-uppercase"> <i class="bx bx-book-bookmark fs-3"></i>CLass Section</h3>
                        </div>
                        <div class="card-body">
                            {{-- Insert image  --}}
                            <form action="{{ route('course.section.create') }}" method="POST">
                                @csrf
                                {{-- Course  --}}
                                <div class="mb-3 form-group">
                                    <label for="course_id" class="form-label h6 my-2">Course</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-book"></i></span>
                                        <select class="form-select @error('course_id')
                                            is-invalid
                                        @enderror" name="course_id" id="course_id"
                                            aria-label="Default select example">
                                            <option value="" selected>Choose Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}" >{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Section  --}}
                                <div class="mb-3 form-group">
                                    <label for="section_id" class="form-label h6 my-2">Section</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-hourglass"></i></span>
                                        <select class="form-select @error('section_id')
                                            is-invalid
                                        @enderror" name="section_id" id="section_id"
                                            aria-label="Default select example">
                                            <option value="" selected>Choose Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('section_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <button style="background-color: #ff6c0f; color:white;" class="btn mt-3"><i class="bx bx-down-arrow-alt"></i> Save</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
