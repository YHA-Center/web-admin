@extends('admin.master.master')

@section('content')

<main>
    <div class="container-fluid p-2 p-md-4">

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 ">

                <a href="{{ route('admin.course') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                <div class="card my-3 border-warning shadow">
                    {{-- Card Header  --}}
                    <div class="card-header border-warning">
                        <h3 class="h4 text-primary text-uppercase"> <i class="bx bx-book-bookmark fs-3"></i>Class</h3>
                    </div>
                    <div class="card-body">
                        {{-- Insert image  --}}
                        <form action="{{ route('teacher.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label h6 my-2">Course</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-book"></i></span>
                                    <select class="form-select" name="courseName" id="" aria-label="Default select example">
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


                            {{-- Image  --}}
                            <div class="mb-3 form-group">
                                <label for="image" class="form-label h6 my-2">Image</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid  @enderror" id="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Age  --}}
                            <div class="mb-3 form-group">
                                <label for="age" class="form-label h6 my-2">Age</label>
                                <input type="text" name="age" value="{{ old('age') }}"
                                    class="form-control @error('age') is-invalid  @enderror" id="age" placeholder="Instructor Age">
                                @error('age')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Position  --}}
                            <div class="mb-3 form-group">
                                <label for="position" class="form-label h6 my-2">Position</label>
                                <input type="text" name="position" value="{{ old('position') }}"
                                    class="form-control @error('position') is-invalid  @enderror" id="position" placeholder="Instructor Position">
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <button class="btn btn-warning mt-3"><i class="fas fa-download"></i> Save</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection