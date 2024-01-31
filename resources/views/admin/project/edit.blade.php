@extends('admin.master.master')

@section('content')

<main>
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 ">

                <a href="{{ route('admin.project') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                <div class="card my-3 border-warning shadow">
                    {{-- Card Header  --}}
                    <div class="card-header border-warning">
                        <h3 class="h5 text-primary"> <i class="bx bx-folder fs-3"></i> Edit Project</h3>
                    </div>
                    <div class="card-body">
                        {{-- Insert image  --}}
                        <form action="{{ route('project.update', $data->id) }}" 
                            method="POST" 
                            enctype="multipart/form-data">
                            @csrf
                            <img src="{{ asset('storage/'.$data->image) }}" width="280" alt="" class="mb-3 rounded">
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="title" class="form-label h6 my-2">Name</label>
                                <input type="text" name="title" class="form-control @error('title')
                                    is-invalid
                                @enderror" value="{{ old('title', $data->title) }}" id="title" placeholder="Project Name">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- course  --}}
                            <div class="mb-3 form-group">
                                <label for="course" class="form-label h6 my-2">Course</label>
                                <select name="course" id="" class="form-select @error('course')
                                    is-invalid
                                @enderror">
                                    <option value="">Open this select box</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" @if ($data->course_id == $course->id)
                                            selected
                                        @endif>{{ $course->name }}</option>  
                                    @endforeach
                                </select>
                                @error('course')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- description  --}}
                            <div class="mb-3 form-group">
                                <label for="desc" class="form-label h6 my-2">Description</label>
                                <textarea type="text" name="desc" rows="3" style="resize: none;"
                                    class="form-control @error('desc') is-invalid  @enderror" id="desc" placeholder="Project description">{{ old('desc', $data->desc) }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    {{-- link  --}}
                                    <div class="mb-3 form-group">
                                        <label for="demo" class="form-label h6 my-2">Demo</label>
                                        <input type="text" name="demo" value="{{ old('demo', $data->demo) }}"
                                            class="form-control @error('demo') is-invalid  @enderror" id="demo" placeholder="Demo Link">
                                        @error('demo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-12 col-md-6">
                                    {{-- link  --}}
                                    <div class="mb-3 form-group">
                                        <label for="github" class="form-label h6 my-2">GitHub</label>
                                        <input type="text" name="github" value="{{ old('github', $data->github) }}"
                                            class="form-control @error('github') is-invalid  @enderror" id="github" placeholder="GitHub Link">
                                        @error('github')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>  
                                </div>
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
                            <button style="background-color: #ff6c0f; color:white;" class="btn mt-3"> <i class="bx bx-up-arrow-alt"></i> Update</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection