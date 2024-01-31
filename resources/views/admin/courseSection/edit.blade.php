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
                            <h3 class="h4 text-primary text-uppercase"> <i class="bx bx-book-bookmark fs-3"></i>Eidt Class Section</h3>
                        </div>
                        <div class="card-body">
                            {{-- Insert image  --}}
                            <form action="{{ route('course.section.update') }}" method="POST">
                                @csrf
                                {{-- Course  --}}
                                <input type="hidden" name="course_id" value="{{ $data->course->id }}">
                                <div class="mb-3 form-group">
                                    <label for="course_id" class="form-label h6 my-2">Course</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-book"></i></span>
                                        <input type="text" class="form-control" name="" value="{{ $data->course->name }}" readonly>
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
                                                <option value="{{ $section->id }}" @if ($section->id == $data->section->id)
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

                                <button style="background-color: #ff6c0f; color:white;" class="btn mt-3"><i class="bx bx-up-arrow-alt"></i> Update</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
