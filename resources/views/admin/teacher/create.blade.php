@extends('admin.master.master')

@section('content')

<main>
    <div class="container-fluid p-2 p-md-4">

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 ">

                <a href="{{ route('admin.teacher') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                <div class="card my-3 border-warning shadow">
                    {{-- Card Header  --}}
                    <div class="card-header border-warning">
                        <h3 class="h4 text-primary text-uppercase"> <i class="bx bx-user-check fs-3"></i> Add Instructor</h3>
                    </div>
                    <div class="card-body">
                        {{-- Insert image  --}}
                        <form action="{{ route('teacher.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label h6 my-2">Instructor Name</label>
                                <input type="text" name="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{ old('name') }}" id="name" placeholder="Instructor Name">
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
                                <select name="position_id" id="position" class="form-select @error('position_id')
                                    is-invalid
                                @enderror">
                                    <option value="">Choose Position</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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