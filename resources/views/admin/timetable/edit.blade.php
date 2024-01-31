@extends('admin.master.master')

@section('content')

    <main>
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.timetable') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i>
                        Back</a>

                    <div class="card my-3 border-warning shadow">
                        {{-- Card Header  --}}
                        <div class="card-header border-warning">
                            <h3 class="h5 text-primary"> <i class="bx bx-table fs-3"></i> Add TimeTable</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('timetable.update', $data->id) }}" method="POST" class="" >
                                @csrf
                                <!-- Course Name  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Course</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-book"></i></span>
                                        <select name="course_id" class="form-select @error('course_id')
                                          is-invalid
                                        @enderror" id="" aria-label="Default select example">
                                            <option value="">Open this select menu</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}" @if ($course->id == $data->course)
                                                    selected
                                                @endif>{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- student  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Student</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-file"></i></span>
                                        <select class="form-select @error('student_id')
                                          is-invalid
                                        @enderror" name="student_id" id="" aria-label="Default select example">
                                        <option value="">Open this select menu</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}" @if ($student->id == $data->student)
                                                    selected
                                                @endif>{{ $student->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('student_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Subject  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Subject</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-file"></i></span>
                                        <select class="form-select @error('subject_id')
                                          is-invalid
                                        @enderror" name="subject_id" id="" aria-label="Default select example">
                                            <option value="">Open this select menu</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}" @if ($student->id == $data->subject)
                                                    selected
                                                @endif>{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Section  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Section</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-hourglass"></i></span>
                                        <select class="form-select @error('section_id')
                                          is-invalid
                                        @enderror" name="section_id" id="" aria-label="Default select example">
                                            <option value="">Open this select menu</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}" @if ($section->id == $data->section)
                                                    selected
                                                @endif>{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('section_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Teacher    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Teacher</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                                        <select class="form-select @error('teacher_id')
                                          is-invalid
                                        @enderror" name="teacher_id" id="" aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" @if ($teacher->id == $data->teacher)
                                                    selected
                                                @endif>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Teacher  assistant  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Assistance Teacher</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                                        <select class="form-select @error('assistant_id')
                                          is-invalid
                                        @enderror" name="assistant_id" id="" aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" @if ($teacher->id == $data->assistant)
                                                    selected
                                                @endif>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('assistant_id')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Date    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-time"></i></span>
                                        <input type="date" value="{{ old('date', $data->date) }}" name="date" id="date" class="form-control @error('date')
                                          is-invalid
                                        @enderror">
                                        @error('date')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Teacher    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                        <textarea name="description" id="" rows="5" placeholder="What would you like to say..."
                                            class="form-control @error('description') is-invalid
                                            @enderror" style="resize: none;">{{ old('description', $data->description) }}</textarea>
                                            @error('description')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                              </div>
                                            @enderror
                                    </div>
                                </div>
                                <button style="background-color: #ff6c0f; color:white;" type="submit" class="btn"><i class="bx bx-up-arrow-alt"></i> &nbsp;
                                    Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection
