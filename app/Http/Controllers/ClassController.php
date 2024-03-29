<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\CourseSubjectInstructor;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    // direct class create 
    public function createPage(){
        $courses = Course::get();
        $subjects = Subject::get();
        return view('admin.class.create', compact('courses', 'subjects'));
    }

    // create class
    public function create(Request $request){

        Validator::make($request->all(), [
            'courseId' => 'required|unique:class_models,course_id',
        ])->validate();
        
        $courseId = $request->courseId;
        $subjectIds = $request->input('subjects'); // Attach subjects and instructors to the course

        // dd($request->all());
        foreach ($subjectIds as $subjectId) {
            // Create a new CourseSubjectInstructor instance
            ClassModel::create([
                'course_id' => $courseId,
                'subject_id' => $subjectId['id'],
            ]);
        }
        return redirect()->route('admin.course')->with(['success' => 'Created class successfully!']);
    }

        // edit class
        public function edit($id){
            $data = Course::where('id', $id)
            ->with(['subjects' => function ($query) {
                $query->select('subjects.*')->distinct();
            }])
            ->first();  
            $subjects = Subject::get();
            return view('admin.class.edit', compact('data', 'subjects'));
        }

    // update class
    public function update(Request $request){
        $courseId = $request->course_id;
        $subjectIds = $request->input('subjects'); // Attach subjects and instructors to the course

        // dd($request->all()); 
        // delete all data
        ClassModel::where('course_id', $courseId)->delete();

        foreach ($subjectIds as $subjectId) {
            // Create a new CourseSubjectInstructor instance
            ClassModel::create([
                'course_id' => $courseId,
                'subject_id' => $subjectId['id'],
            ]);
        }
        return redirect()->route('admin.course')->with(['success' => 'Update Related Class Successfully!']);
    }

    // delete class
    public function delete($id){
        ClassModel::where('course_id', $id)->delete();
        return redirect()->route('admin.course')->with(['success' => 'Deleted class successfully!']);
    }

}
