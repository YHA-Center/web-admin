@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.course') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i>
                        Back</a>

                    <div class="card my-3 border-warning shadow">
                        {{-- Card Header  --}}
                        <div class="card-header border-warning">
                            <h3 class="h4 text-primary text-uppercase"> <i class="bx bx-book-bookmark fs-3"></i>Class</h3>
                        </div>
                        <div class="card-body">
                            {{-- Insert image  --}}
                            <form action="{{ route('teacher.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Course  --}}
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label h6 my-2">Course</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-book"></i></span>
                                        <select class="form-select" name="courseId" id=""
                                            aria-label="Default select example">
                                            <option selected>Choose Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Subject  --}}
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label h6 my-2">Subject</label>
                                    <div class="row subject-group">
                                        {{-- Subject Groups  --}}
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-12">
                                            <button class="btn btn-outline-primary w-100 subject_btn" type="button">
                                                <i class="bx bx-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                    
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Instructor  --}}
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label h6 my-2">Instructors</label>
                                    <div class="row instructor-group">
                                        {{-- Subject Groups  --}}
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-12">
                                            <button class="btn btn-outline-primary w-100 instructor_btn" type="button">
                                                <i class="bx bx-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                    
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary mt-3"><i class="bx bx-down-arrow-alt"></i> Save</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <script>

document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.subject-group');
    const add_subject_btn = document.querySelector(".subject_btn");
    const instructor_container = document.querySelector('.instructor-group');
    const add_instructor_btn = document.querySelector(".instructor_btn");

    // for subject
    add_subject_btn.addEventListener('click', () => {
        const newSubject = document.createElement('div');
        newSubject.classList.add('col-6', 'mb-2');
        newSubject.innerHTML = `
            {{-- Subjects --}}
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-file"></i></span>
                <select class="form-select " name="subjectId" aria-label="Default select example">
                    <option selected>Choose Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-danger btn-sm subject_del" type="button"><i class="bx bx-trash"></i> </button>
            </div>
        `;
        container.appendChild(newSubject);

        // Update the event listener for delete button
        const del_subject_btn = newSubject.querySelector(".subject_del");
        del_subject_btn.addEventListener('click', () => {
            // Handle delete button click here
            container.removeChild(newSubject);
        });
    });


    add_instructor_btn.addEventListener('click', () => {
        const newSubject = document.createElement('div');
        newSubject.classList.add('col-6', 'mb-2');
        newSubject.innerHTML = `
            {{-- Subjects --}}
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                <select class="form-select " name="instructorId" aria-label="Default select example">
                    <option selected>Choose Instructor</option>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-danger btn-sm instructor_del" type="button"><i class="bx bx-trash"></i> </button>
            </div>
        `;
        instructor_container.appendChild(newSubject);

        // Update the event listener for delete button
        const del_instructor_btn = newSubject.querySelector(".instructor_del");
        del_instructor_btn.addEventListener('click', () => {
            // Handle delete button click here
            instructor_container.removeChild(newSubject);
        });
    });
});

    </script>
@endsection
