@extends('admin.master.master')

@section('content')

<main>
    <div class="container-fluid p-2 p-md-4">

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 ">

                <a href="{{ route('admin.course') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt">    </i> Back</a>

                <div class="card my-3 border-warning shadow">
                    {{-- Card Header --}}
                    <div class="card-header border-warning">
                        <h3 class="h5 text-primary"> <i class="bx bx-book-open fs-3"></i> Edit Subject</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('subject.update') }}" method="POST" >
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            {{-- Title  --}}
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label h6 my-2">Subject name</label>
                                <input type="text" name="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" value="{{ $data->name }}" id="name" placeholder="Enetr subject name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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