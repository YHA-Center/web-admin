@extends('admin.master.master')

@section('content')

<main>
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 ">

                <a href="{{ route('admin.gallery') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                <div class="card my-3 border-warning shadow">
                    {{-- Card Header  --}}
                    <div class="card-header border-warning">
                        <h3 class="h5 text-primary"> <i class="bx bx-image fs-3"></i> Gallery</h3>
                    </div>
                    <div class="card-body">
                        {{-- Insert image  --}}
                        <form action="{{ route('gallery.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <img src="{{ asset('storage/'.$data->image) }}" width="250" alt="">
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label h6 my-2">Name</label>
                                <input type="text" name="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{ old('name', $data->name) }}" id="name" placeholder="Name">
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
                            
                            <button class="btn btn-primary mt-3"> <i class="bx bx-up-arrow-alt"></i> Update</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection