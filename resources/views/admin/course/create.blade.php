@extends('admin.master.master')

@section('content')

<main>
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 ">

                <a href="{{ route('admin.course') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                <div class="card my-3 border-warning shadow">
                    {{-- Card Header  --}}
                    <div class="card-header border-warning">
                        <h3 class="h5 text-primary"> <i class="bx bx-book fs-3"></i> Course</h3>
                    </div>
                    <div class="card-body">
                        {{-- Insert image  --}}
                        <form action="{{ route('course.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label h6 my-2">Name</label>
                                <input type="text" name="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{ old('name') }}" id="name" placeholder="Course Name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- description  --}}
                            <div class="mb-3 form-group">
                                <label for="description" class="form-label h6 my-2">Description</label>
                                <textarea type="text" name="description" rows="7" style="resize: none;"
                                    class="form-control @error('description') is-invalid  @enderror" id="description" placeholder="Course description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- duration  --}}
                            <div class="mb-3 form-group">
                                <label for="duration" class="form-label h6 my-2">Duration</label>
                                <input type="number" name="duration" value="{{ old('duration') }}"
                                    class="form-control @error('duration') is-invalid  @enderror" id="duration" placeholder="Instructor duration">
                                @error('duration')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- normal_price  --}}
                            <div class="mb-3 form-group">
                                <label for="normal_price" class="form-label h6 my-2">Normal Price</label>
                                <input type="number" name="normal_price" value="{{ old('normal_price') }}"
                                    class="form-control @error('normal_price') is-invalid  @enderror" id="normal_price" placeholder="normal_price">
                                @error('normal_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- special_price  --}}
                            <div class="mb-3 form-group">
                                <label for="special_price" class="form-label h6 my-2">Special Price</label>
                                <input type="number" name="special_price" value="{{ old('special_price') }}"
                                    class="form-control @error('special_price') is-invalid  @enderror" id="special_price" placeholder="special_price">
                                @error('special_price')
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
                            
                            <button class="btn btn-primary mt-3"> <i class="bx bx-down-arrow-alt"></i> Save</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection