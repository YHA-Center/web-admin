@extends('admin.master.master')


@section('content')
    

    <main>
        <div class="container-fluid py-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-5 ">
                    <div class="border p-3 border-rounded bg-white shadow">
    
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>Section Create Form</h4>
                            <a href="{{ route('admin.section') }}" class="btn btn-danger btn-sm"> <i class="bx bx-x"></i> </a>
                        </div>
                        <hr>
    
                        <form action="{{ route('section.create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Section Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-calendar-edit"></i></span>
                                    <input type="text" class="form-control" placeholder="Section Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-3 col-form-label">Start Time</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-stopwatch"></i></span>
                                    <input type="time" class="form-control" placeholder="Start Time">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-3 col-form-label">End Time</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-stopwatch"></i></span>
                                    <input type="time" class="form-control" placeholder="End Time">
                                </div>
                            </div>
    
                            <button class="btn btn-primary"><i class="bx bx-save"></i>&nbsp; Save</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection