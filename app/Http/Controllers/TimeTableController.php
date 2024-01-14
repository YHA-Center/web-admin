<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeTableController extends Controller
{
    // direct to timetable create page
    public function createPage(){
        $courses = Course::get();
        $sections = Section::get();
        $subjects = Subject::get();
        $teachers = Teacher::get();
        return view('admin.timetable.create', compact('courses', 'sections', 'subjects', 'teachers'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->get_request_data($request);
        TimeTable::create($data);
        // dd($request->all());
        return redirect()->route('admin.timetable')->with(['success' => 'Added a new timetable.']);
    }

    // validate the request data
    private function validation($request){
        $rule = [
            'course_id' => 'required|',
            'section_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'assistant_id' => 'required',
            'date' => 'required',
            'description' => 'required',
        ];
        Validator::make(
            $request->all(),
            $rule
        )->validate();
    }

    // get request data
    private function get_request_data($request){
        return [
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'section_id' => $request->section_id,
            'assistant_id' => $request->assistant_id,
            'date' => $request->date,
            'description' => $request->description,
        ];
    }
}
