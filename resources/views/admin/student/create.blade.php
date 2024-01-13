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
                        <h3 class="h5 text-primary"> <i class="bx bx-user fs-3"></i> Register Student</h3>
                    </div>
                    <div class="card-body">
                        
                        <form class="" action="{{ route('student.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <!-- Student Name  -->
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-fullname2" class="input-group-text"
                                    ><i class="bx bx-user"></i
                                  ></span>
                                  <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="John Doe"
                                    aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                                </div>
                              </div>
                              <!-- Course  -->
                              <div class="mb-3">
                                <label for="" class="mb-2">Course</label>
                                  <select id="defaultSelect" name="course_id" class="form-select">
                                    <option>Choose Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>                                        
                                    @endforeach
                                  </select>
                              </div>
                              <!-- Section  -->
                              <div class="mb-3">
                                <label for="" class="mb-2">Section</label>
                                  <select id="defaultSelect" name="section_id" class="form-select">
                                    <option>Choose Section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>                                    
                                    @endforeach
                                  </select>
                              </div>
                              <!-- Parent  -->
                              <div class="row">
                                <div class="col-md-6">
                                  <!-- Father Name  -->
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Father Name</label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-male"></i
                                      ></span>
                                      <input
                                        name="father_name"
                                        type="text"
                                        class="form-control"
                                        id="basic-icon-default-fullname"
                                        placeholder="Father Name"
                                        aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <!-- Mother Name  -->
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Mother Name</label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-female"></i
                                      ></span>
                                      <input
                                        type="text"
                                        name="mother_name"
                                        class="form-control"
                                        id="basic-icon-default-fullname"
                                        placeholder="Mother Name"
                                        aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- email  -->
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                  <input
                                    type="text"
                                    name="email"
                                    id="basic-icon-default-email"
                                    class="form-control"
                                    placeholder="john.doe"
                                    aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" />
                                  <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                                </div>
                                <div class="form-text">You can use letters, numbers & periods</div>
                              </div>
                              <!-- phone number  -->
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-phone2" class="input-group-text"
                                    ><i class="bx bx-phone"></i
                                  ></span>
                                  <input
                                    type="text"
                                    name="phone"
                                    id="basic-icon-default-phone"
                                    class="form-control phone-mask"
                                    placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" />
                                </div>
                              </div>
                              <!-- viber phone  -->
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Viber Phone Number</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-fullname2" class="input-group-text"
                                    ><i class="bx bx-phone-call"></i
                                  ></span>
                                  <input
                                    type="text"
                                    name="viber_phone"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="Viber Phone Number"
                                    aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                                </div>
                              </div>
                              <!-- NRC  -->
                              <div class="row mb-3">
                                <label for="" class="mb-2">NRC number</label>
                                <div class="col-2">
                                  <select id="defaultSelect" name="f_nrc" class="form-select">
                                    <option>0</option>
                                    @for ($i=1; $i<=14; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex align-items-center">
                                      /
                                      <input type="text" name="s_nrc" class="form-control d-inline" id="">
                                    </div>
                                </div>
                                <div class="col-3">
                                  <select id="defaultSelect" name="t_nrc" class="form-select">
                                    <option value="">Null</option>
                                    <option value="1">N</option>
                                    <option value="2">A</option>
                                    <option value="3">B</option>
                                  </select>
                                </div>
                                <div class="col-4">
                                  <input
                                    id=""
                                    name="number_nrc"
                                    class="form-control"
                                    type="number"
                                    placeholder="Number" />
                                </div>
                              </div>
                              <!-- Gender and DOB  -->
                              <div class="row">
                                  <div class="col-6">
                                    <label class="form-label" for="basic-icon-default-email d-block">Gender</label>
                                    <div class="d-flex mt-2">
                                      <div class="form-check form-check-inline">
                                        <input
                                          class="form-check-input"
                                          type="radio"
                                          name="gender"
                                          id="inlineRadio1"
                                          value="1" />
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input
                                          class="form-check-input"
                                          type="radio"
                                          name="gender"
                                          id="inlineRadio2"
                                          value="0" />
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Date of Birth  -->
                                  <div class="col-6">
                                    <div class="mb-3">
                                      <label for="html5-datetime-local-input" class="col-form-label">Date of Birth</label>
                                      <input
                                          class="form-control"
                                          type="date"
                                          name="date_of_birth"
                                          id="html5-datetime-local-input" />
                                    </div>
                                  </div>
                              </div>
                              <!-- Register Date  -->
                              <div class="row">
                                <div class="col-md-6 mb-3">
                                  <label for="" class="col-form-label">Register Date</label>
                                    <input
                                        class="form-control"
                                        name="register_data"
                                        type="datetime-local"
                                        value="2021-06-18T12:30:00"
                                        id="" />
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="" class="col-form-label">End Date</label>
                                    <input
                                        class="form-control"
                                        type="date"
                                        name="end_date"
                                        id="" />
                                </div>
                              </div>
                              <!-- Address  -->
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-message">Address</label>
                                <div class="row mb-3">
                                  <div class="col-6">
                                    <input
                                    type="text"
                                    name="city"
                                    id=""
                                    class="form-control"
                                    placeholder="City"
                                    aria-describedby="" />
                                  </div>
                                  <div class="col-6">
                                    <input
                                    type="text"
                                    name="township"
                                    id=""
                                    class="form-control"
                                    placeholder="Township"
                                    aria-describedby="" />
                                  </div>
                                </div>
                              </div>
                              <!-- Education  -->
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Education</label>
                                <textarea
                                  id="basic-default-message"
                                  name="education"
                                  class="form-control"
                                  placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                              </div>
                              <!-- Image  -->
                              <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" id="formFile" name="image" />
                              </div>
                              
                              <button type="submit" class="btn btn-primary">Register</button>
                            </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection