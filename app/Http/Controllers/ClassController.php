<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\CourseSubjectInstructor;

class ClassController extends Controller
{
    // direct class create 
    public function createPage(){
        $courses = Course::get();
        $subjects = Subject::get();
        $instructors = Teacher::get();
        return view('admin.class.create', compact('courses', 'subjects', 'instructors'));
    }

    // create class
    public function create(Request $request){
        
        $courseId = $request->courseId;
        // Attach subjects and instructors to the course
        $subjectIds = $request->input('subjects');
        $instructorIds = $request->input('instructors');

        foreach ($subjectIds as $subjectId) {
            foreach ($instructorIds as $instructorId) {

                // Create a new CourseSubjectInstructor instance
                CourseSubjectInstructor::create([
                    'course_id' => $courseId,
                    'subject_id' => $subjectId['id'],
                    'instructor_id' => $instructorId['id'],
                    // Add other attributes if needed
                ]);
            }
        }
        return view('admin.course')->with(['success' => 'Created Class Successfully!']);
    }

}
