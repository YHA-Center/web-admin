@extends('admin.master.master')

@section('content')
    <div class="container-fluid">

        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Search by Name" id="searchInput">
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif



        {{-- Section Data Table  --}}
        {{-- Section  --}}
        <div class="row mb-2">

            {{-- Class Section  --}}
            <div class="fs-4 mb-4"> <i class="bx bx-user fs-3 mb-1"></i>Student</div>

            <div class="col-12 mb-5">
                {{-- @if (count($courseSections) > 0) --}}
                    <div class="table-responsive text-nowrap bg-light rounded shadow mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="studentTableBody">
                                @foreach ($students as $student)
                                    {{-- dd($students->toArray()) --}}
                                    <tr class="student-row">
                                        <td>{{ $student->id }}</td>

                                        <td>
                                            <img src="{{ asset('storage/' . $student->image) }}" width="45" alt="Image">
                                        </td>
                                                                               
                                        <td class="student-name">{{ $student->name }}</td>
                                        <td class="student-phone">{{ $student->email }}</td>
                                        <td class="student-email">{{ $student->phone }}</td>
                                        <td>{{ $student->course_id }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('student.edit', ['id' => $student->id]) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('student.delete', ['id' => $student->id]) }}"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                               @endforeach 
                            </tbody>
                        </table>
                    </div>
                {{-- @else --}}
                    {{-- <div class="fs-6 text-uppercase text-center my-4">No Record!</div> --}}
                {{-- @endif --}}
                {{-- {{ $courseSections->appends(['section' => $sections->currentPage()])->links() }} --}}
                <a style="background-color: #ff6c0f; color:white;" href="{{ route('student.createPage') }}" class="btn mb-5 d-inline"> <i
                        class="bx bx-plus"></i> Register Student</a>
            </div>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const studentTableBody = document.getElementById('studentTableBody');
    
            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const studentRows = studentTableBody.getElementsByClassName('student-row');
    
                Array.from(studentRows).forEach(function (row) {
                    const studentName = row.querySelector('.student-name').textContent.toLowerCase();
                    const studentPhone = row.querySelector('.student-phone').textContent.toLowerCase();
                    const studentEmail = row.querySelector('.student-email').textContent.toLowerCase();
    
                    // Check if any of the criteria match the search term
                    if (studentName.includes(searchTerm) || studentPhone.includes(searchTerm) || studentEmail.includes(searchTerm)) {
                        row.style.display = ''; // Show the row if it matches any criteria
                    } else {
                        row.style.display = 'none'; // Hide the row if it doesn't match any criteria
                    }
                });
            });
        });
    </script>
    
    


@endsection
