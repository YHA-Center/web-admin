    @extends('admin.master.master')

    @section('content')

    <style>
        i{
            font-size: 17px;
        }
    </style>

    <main>
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-12">

                    <a href="{{ route('admin.student') }}" class="btn" style="background: #ff6c0f; color:white;"> <i class="bx bx-left-arrow-alt"></i> Back</a>

                    <div class="card my-3 border-warning shadow">
                        {{-- Card Header  --}}
                    <form class="" action="{{ route('student.create') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-header border-warning d-flex justify-content-between align-items-center">
                            <h3 style="color: #ff6c0f;" class="h5"> <i class="bx bx-user fs-3"></i> Register Student</h3>
                        
                        </div>
                    </div>
                        <div class="card-body">

                        
                                @csrf

                                <div class="mb-3 row">
                                    <div class="upload">
                                        <label for="formFile" class="form-label">
                                            <img style="width:150px; border-radius: 10px;" id="img" src="{{asset("image/logo/upload.png")}}" alt="">
                                        </label>
                                        <input style="font-size: 17px; display:none;" class="form-control" type="file" id="formFile" name="image" />
                                    </div>
                                </div>
                                <!-- Student Name  -->
                                <div class="mb-3">
                                    <label style="font-size:16px;" class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"
                                            ><i class="bx bx-user"></i
                                        ></span>
                                        <input style="font-size: 17px;"
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
                                    <label style="font-size:16px;" for="" class="mb-2">Course</label>
                                    <select id="defaultSelect" name="course_id" class="form-select">
                                        <option>Choose Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Section  -->
                                <div class="mb-3">
                                    <label style="font-size:16px;" for="" class="mb-2">Section</label>
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
                                            <label style="font-size:16px;" class="form-label" for="basic-icon-default-fullname">Father Name</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                                    ><i class="bx bx-male"></i
                                                ></span>
                                                <input style="font-size: 17px;"
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
                                            <label style="font-size:16px;" class="form-label" for="basic-icon-default-fullname">Mother Name</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                                    ><i class="bx bx-female"></i
                                                ></span>
                                                <input style="font-size: 17px;"
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
                                    <label style="font-size:16px;" class="form-label" for="basic-icon-default-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input style="font-size: 17px;"
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
                                    <label style="font-size:16px;" class="form-label" for="basic-icon-default-phone">Phone No</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"
                                            ><i class="bx bx-phone"></i
                                        ></span>
                                        <input style="font-size: 17px;"
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
                                    <label style="font-size:16px;" class="form-label" for="basic-icon-default-fullname">Viber Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"
                                            ><i class="bx bx-phone-call"></i
                                        ></span>
                                        <input style="font-size: 17px;"
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
                                    <label style="font-size:16px;" for="nrc" class="mb-2">NRC number</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"
                                            ><i class="fa-solid fa-id-card"></i></span>
                                        <input style="font-size: 17px;"
                                            type="text"
                                            name="nrc"
                                            class="form-control"
                                            id="basic-icon-default-fullname"
                                            placeholder="NRC Number"
                                            aria-label="John Doe"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                                <!-- Gender and DOB  -->
                                <div class="row">
                                    <div class="col-6">
                                        <label style="font-size:16px;" class="form-label" for="basic-icon-default-email d-block">Gender</label>
                                        <div class="d-flex mt-2">
                                            <div class="form-check form-check-inline">
                                                <input style="font-size: 17px;"
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="gender"
                                                    id="inlineRadio1"
                                                    value="1" />
                                                <label style="font-size:16px;" class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input style="font-size: 17px;"
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="gender"
                                                    id="inlineRadio2"
                                                    value="0" />
                                                <label style="font-size:16px;" class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Date of Birth  -->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label style="font-size:16px;" for="html5-datetime-local-input" class="col-form-label">Date of Birth</label>
                                            <input style="font-size: 17px;"
                                                class="form-control"
                                                type="date"
                                                name="date_of_birth"
                                                id="html5-datetime-local-input" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Address  -->
                                <div class="mb-3">
                                    <label style="font-size:16px;" class="form-label" for="basic-icon-default-message">Address</label>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <input style="font-size: 17px;"
                                                type="text"
                                                name="city"
                                                class="form-control"
                                                placeholder="City"
                                                aria-describedby="" />
                                        </div>
                                        <div class="col-6">
                                            <input style="font-size: 17px;"
                                                type="text"
                                                name="township"
                                                class="form-control"
                                                placeholder="Township"
                                                aria-describedby="" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Education  -->
                                <div class="mb-3">
                                    <label style="font-size:16px;" class="form-label" for="basic-default-message">Education</label>
                                    <textarea style="font-size: 17px;"
                                        id="basic-default-message"
                                        name="education"
                                        class="form-control"
                                        placeholder="Background Education"></textarea>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-6">
                                    <label style="font-size:16px;" for="" class="mb-2">Status</label>
                                    <select id="defaultSelect" name="status" class="form-select">
                                            <option value="1">Enroll</option>
                                            <option value="0">Panding</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label style="font-size:16px;" for="html5-datetime-local-input" class="col-form-label">Enroll Date</label>
                                    <input style="font-size: 17px;"
                                        class="form-control"
                                        type="date"
                                        name="enroll_date"
                                        id="html5-datetime-local-input" />
                                </div>
                                </div>

                                <!-- Image  -->
                                {{-- <div class="mb-3 row">
                                    <div class="col-6">
                                        <label style="font-size:16px; display:none;" for="formFile" class="form-label">Image</label> <br> <br> <br>
                                        <input style="font-size: 17px; display:none;" class="form-control" type="file" id="formFile" name="image" />
                                    </div>
                                    <div class="col-6">
                                        <label style="font-size:16px;" for="formFile" class="form-label">
                                            <img style="width:100px; border-radius: 10px;" id="img" src="{{asset("image/logo/logo.png")}}" alt="">
                                            hi
                                        </label>
                                        
                                    </div>
                                </div> --}}

                                <button style="background: #ff6c0f; color:white;" type="submit" class="btn">Register</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <script>
        var img = document.querySelector('#img');
        var input = document.querySelector('#formFile');

        input.addEventListener("change", () => {
            img.src = URL.createObjectURL(input.files[0]);
        })
    </script>

    @endsection
