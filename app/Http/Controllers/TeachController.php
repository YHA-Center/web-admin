<?php

namespace App\Http\Controllers;

use App\Models\Teach;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachController extends Controller
{
    // direct create page
    public function createPage(){
        $teachers = Teacher::get();
        $subjects = Subject::get();
        return view('admin.teach.create', compact('teachers', 'subjects'));
    }

    // create teach data
    public function create(Request $request){
        $teacherId = $request->teacher_id;
        // Attach subjects and instructors to the course
        $subjectIds = $request->input('subjects');

        foreach ($subjectIds as $subjectId) {
            // Create a new CourseSubjectInstructor instance
            Teach::create([
                'teacher_id' => $teacherId,
                'subject_id' => $subjectId['id'],
                // Add other attributes if needed
            ]);
        }
        // dd(Teach::get()->toArray());
        return view('admin.teacher')->with(['success' => 'Created Class Successfully!']);
    }

    // edit teach data page
    public function edit($id){

    }

    // update teach data
    public function update(Request $request){

    }

    // delet teach data
    public function delete($id){
        
    }
}
