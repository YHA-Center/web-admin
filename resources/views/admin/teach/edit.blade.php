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
                            <form action="{{ route('teach.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="teacher_id" value="{{ $data->id }}">
                                {{-- Course  --}}
                                <div class="mb-3 form-group">
                                    <label for="name" class="form-label h6 my-2">Instructor</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-check"></i></span>
                                        <input type="text" value="{{ $data->name }}" class="form-control" disabled>
                                    </div>
                                </div>

                                {{-- Subject  --}}
                                <div class="mb-3 form-group">
                                    <input type="hidden" name="" class="subject_count"
                                        value="{{ count($subjects) }}">
                                    <label for="name" class="form-label h6 my-2">Subject</label>
                                    <div class="row subject-group">
                                        {{-- Subject Groups  --}}
                                        <input type="hidden" id="sub_count" name=""
                                            value="{{ count($data->subjects) }}">

                                        <?php $count = 0 ?>
                                        @foreach ($data->subjects as $item)
                                            <div class="col-6 mb-2">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-file"></i></span>
                                                    <select class="form-select " name="subjects[{{ $count }}][id]"
                                                        aria-label="Default select example">
                                                        <option selected>Choose Subject</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->id }}"
                                                                @if ($subject->id == $item->id) selected @endif>
                                                                {{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-outline-danger btn-sm subject_del_other"
                                                        data-item-id="{{ $item->id }}" type="button"><i
                                                            class="bx bx-trash"></i> </button>
                                                </div>
                                            </div>
                                            <?php $count++ ?>
                                        @endforeach
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-12">
                                            <button class="btn btn-outline-primary w-100 subject_btn" type="button">
                                                <i class="bx bx-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>

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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.subject_del_other').on('click', function() {
                // Find the parent element with class 'col-6'
                var col6Element = $(this).closest('.col-6');

                // Do something with the 'col-6' element
                col6Element.remove();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.subject-group');
            const add_subject_btn = document.querySelector(".subject_btn");
            let subject_count = document.querySelector('.subject_count').value;
            let subject = document.querySelector('#sub_count').value - 1;

            // control the subject add button
            let control_subject = (ele) => {
                if (ele > subject_count - 1) {
                    add_subject_btn.classList.add('d-none');
                } else {
                    add_subject_btn.classList.remove('d-none');
                }
            }



            // for subject
            add_subject_btn.addEventListener('click', () => {
                subject++; // increment the start
                const newSubject = document.createElement('div');
                newSubject.classList.add('col-6', 'mb-2');
                newSubject.innerHTML = `
            {{-- Subjects --}}
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-file"></i></span>
                <select required class="form-select " name="subjects[${subject}][id]" aria-label="Default select example">
                    <option value="" selected>Choose Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-danger btn-sm subject_del" type="button"><i class="bx bx-trash"></i> </button>
            </div>
        `;
                container.appendChild(newSubject);

                // Update the event listener for delete button
                const del_subject_btn = newSubject.querySelector(".subject_del");
                del_subject_btn.addEventListener('click', () => {
                    // Handle delete button click here
                    container.removeChild(newSubject);
                    subject -= 1;
                    // control the subject button 
                    control_subject(subject);
                });

                // control the subject button 
                control_subject(subject)
            });

        });
    </script>
@endsection
