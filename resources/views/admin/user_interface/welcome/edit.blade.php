@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.home') }}" class="btn btn-secondary"><i class="bx bx-left-arrow-alt"></i> Back</a>

                    <div class="card mt-3">
                        {{-- Header  --}}
                        <div class="card-header">
                            <h3 class="h4 text-primary"> <i class="bx bx-edit-alt fs-3"></i> Edit Image</h3>
                        </div>
                        {{-- Card Image  --}}
                        <img src="{{ asset('storage/'.$welcome->image) }}" alt="" class="card-img-top">
                        {{-- Card body  --}}
                        <div class="card-body">
                            {{-- Insert image  --}}
                            <form action="{{ route('welcome.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    {{-- hidden Image Id  --}}
                                    <input type="hidden" name="id" value="{{ $welcome->id }}">
                                    <label for="image" class="form-label h6 mb-2">Choose new image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid  @enderror" id="image">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button style="background-color: #ff6c0f; color:white;" class="btn" type="submit"> <i class="bx bx-up-arrow-alt"></i> Update</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
