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
                            <form action="" method="POST" class="">
                                @csrf
                                <!-- Course Name  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Course</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-book"></i></span>
                                        <select class="form-select" id="course" aria-label="Default select example">
                                            <option value="">Open this select menu</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Subject  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Subject</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-file"></i></span>
                                        <select class="form-select" id="subjects" aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                            {{-- More option goes here  --}}
                                        </select>
                                    </div>
                                </div>

                                <!-- Section  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Section</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-hourglass"></i></span>
                                        <select class="form-select" id="" aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Teacher    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Teacher</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                                        <select class="form-select" id="" aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Teacher    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Assistance Teacher</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                                        <select class="form-select" id="" aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Teacher    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-time"></i></span>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                </div>
                                <!-- Teacher    -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-detail"></i></span>
                                        <textarea name="description" id="" rows="5" placeholder="What would you like to say..."
                                            class="form-control" style="resize: none;"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> &nbsp;
                                    Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection
