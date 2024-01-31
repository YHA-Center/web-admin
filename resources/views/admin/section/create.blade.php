@extends('admin.master.master')


@section('content')
    

    <main>
        <div class="container-fluid py-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-5 ">
                    <div class="border p-3 border-rounded bg-white shadow">
    
                        <div class="d-flex align-items-end justify-content-between">
                            <h4 class="d-inline mb-0"> <i class="bx bx-hourglass fs-4 mb-1"></i> Add Section</h4>
                            <a href="{{ route('admin.section') }}" class="btn btn-danger btn-sm"> <i class="bx bx-x"></i> </a>
                        </div>
                        <hr>
    
                        <form action="{{ route('section.create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="">Section Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-calendar-edit"></i></span>
                                    <input type="text" name="name" class="form-control @error('name')
                                        is-invalid
                                    @enderror" value="{{ old('name') }}" placeholder="Section Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-3 col-form-label">Start Time</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-stopwatch"></i></span>
                                    <input type="time" name="start" class="form-control @error('start')
                                        is-invalid
                                    @enderror" placeholder="Start Time">
                                    @error('start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-3 col-form-label">End Time</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-stopwatch"></i></span>
                                    <input type="time" name="end" class="form-control @error('end')
                                    is-invalid
                                @enderror" placeholder="End Time">
                                    @error('start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
    
                            <button style="background-color: #ff6c0f; color:white;" class="btn"><i class="bx bx-save"></i>&nbsp; Save</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection