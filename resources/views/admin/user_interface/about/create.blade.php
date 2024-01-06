@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.home') }}" class="btn btn-secondary"> <i
                            class="bx bx-left-arrow-alt"></i> Back</a>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="h3 text-primary text-uppercase"> <i class="bx bx-image fs-2"></i> Add Image</h3>
                        </div>

                        {{-- Card image  --}}

                        <div class="card-body">

                            {{-- Insert image  --}}
                            <form action="{{ route('about.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="image" class="form-label h6 mb-2">Select Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid  @enderror" id="image">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit"> <i class="bx bx-down-arrow-alt"></i> Save</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
