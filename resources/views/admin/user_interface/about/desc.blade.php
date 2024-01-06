@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.home') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                    <form action="{{ route('about.desc.update') }}" method="POST">
                        @csrf
                        <div class="card mt-3">
                            {{-- Header  --}}
                            <div class="card-header">
                                <h3 class="h3 text-primary"> <i class="bx bx-edit-alt fs-3"></i> Edit Description</h3>
                            </div>
                            {{-- Card body  --}}
                            <div class="card-body">
                                <input type="text" value="{{ $data->id }}" name="id" hidden>
                                <textarea style="resize: none;" class="form-control" rows="10" name="desc">{{ $data->desc }}</textarea>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> <i class="bx bx-up-arrow-alt"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
@endsection
