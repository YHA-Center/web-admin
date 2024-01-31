@extends('admin.master.master')

@section('content')
    <main>
        <div class="container-fluid p-2 p-md-4">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 ">

                    <a href="{{ route('admin.teacher') }}" class="btn btn-secondary"> <i class="bx bx-left-arrow-alt"></i>
                        Back</a>

                    <div class="card my-3 border-warning shadow">
                        {{-- Card Header  --}}
                        <div class="card-header border-warning">
                            <h3 class="h4 text-primary text-uppercase"> <i class="bx bx-book-bookmark fs-3"></i>Teach</h3>
                        </div>
                        <div class="card-body">
                            {{-- Insert image  --}}
                            <form action="{{ route('teach.create') }}" method="POST">
                                @csrf
                                {{-- Course  --}}
                                <div class="mb-3 form-group">
                                    <label for="teacher_id" class="form-label h6 my-2">Instructor</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                                        <select
                                            class="form-select @error('teacher_id')
                                            is-invalid
                                        @enderror"
                                            name="teacher_id" id="teacher_id" aria-label="Default select example">
                                            <option value="" selected>Choose Instructor</option>
                                            @foreach ($teachers as $teach)
                                                <option value="{{ $teach->id }}">{{ $teach->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                {{-- Subject  --}}
                                <div class="mb-3 form-group">
                                    <input type="hidden" name="" class="subject_count"
                                        value="{{ count($subjects) }}">
                                    <label for="name" class="form-label h6 my-2">Subject</label>
                                    <div class="row subject-group">
                                        {{-- Subject Groups  --}}
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-12">
                                            <button class="btn btn-outline-primary w-100 subject_btn" type="button">
                                                <i class="bx bx-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <button style="background-color: #ff6c0f; color:white;" class="btn mt-3"><i class="bx bx-down-arrow-alt"></i> Save</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.subject-group');
            const add_subject_btn = document.querySelector(".subject_btn");  // add subject button
            let subject_count = document.querySelector('.subject_count').value;  // get the subject count from database
            console.log(subject_count);
            let subject = 0;

            // control the subject add button
            let control_subject = (ele) => {
                if (ele > subject_count - 1) {
                    add_subject_btn.classList.add('d-none');
                }else{
                    add_subject_btn.classList.remove('d-none');
                }
            }

            // for subject
            // Restore previous subjects from localStorage on page load
            document.addEventListener('DOMContentLoaded', () => {
                const savedSubjects = JSON.parse(localStorage.getItem('subjects')) || [];
                savedSubjects.forEach(savedSubject => {
                    addSubject(savedSubject);
                });
            });

            add_subject_btn.addEventListener('click', () => {
                subject++;
                const newSubject = createSubjectElement(subject);
                container.appendChild(newSubject);
                control_subject(subject);
                updateLocalStorage();
            });

            function createSubjectElement(subjectIndex) {
                const newSubject = document.createElement('div');
                newSubject.classList.add('col-6', 'mb-2');
                newSubject.innerHTML = `
                    {{-- Subjects --}}
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-file"></i></span>
                        <select required class="form-select @error('subjects[${subjectIndex}][id]') is-invalid @enderror" name="subjects[${subjectIndex}][id]" aria-label="Default select example">
                            <option value="" selected>Choose Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subjects[${subjectIndex}][id]')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <button class="btn btn-outline-danger btn-sm subject_del" type="button"><i class="bx bx-trash"></i> </button>
                    </div>
                `;

                // Update the event listener for delete button
                const del_subject_btn = newSubject.querySelector(".subject_del");
                del_subject_btn.addEventListener('click', () => {
                    subject--;
                    container.removeChild(newSubject);
                    control_subject(subject);
                    updateLocalStorage();
                });

                return newSubject;
            }

            function updateLocalStorage() {
                const subjects = Array.from(container.children).map(subjectElement => {
                    const selectElement = subjectElement.querySelector('select');
                    const selectedValue = selectElement ? selectElement.value : null;
                    return {
                        id: selectedValue, // Extract the subject ID or any other relevant information
                        // Add more properties as needed
                    };
                });
                localStorage.setItem('subjects', JSON.stringify(subjects));
            }
        });
    </script>
@endsection
