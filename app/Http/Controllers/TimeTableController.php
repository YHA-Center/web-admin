<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Register;

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
        // dd($request->all());
        TimeTable::create($data);
        return redirect()->route('admin.timetable')->with(['success' => 'Added a new timetable.']);
    }

    // edit page
    public function edit($id){
        $courses = Course::get();
        $subjects = Subject::get();
        $students = Register::get();
        $sections = Section::get();
        $teachers = Teacher::get();
        $data = TimeTable::select('subjects.id as subject', 'registers.id as student', 
        'sections.id as section', 'teachers.id as teacher', 'courses.id as course',
        'date', 'time_tables.id as id', 'time_tables.assistant_id as assistant', 'time_tables.description as description')
        ->where('time_tables.id', $id)
        ->leftJoin('courses', 'time_tables.course_id', '=', 'courses.id')
        ->leftJoin('subjects', 'time_tables.subject_id', '=', 'subjects.id')
        ->leftJoin('sections', 'time_tables.section_id', '=', 'sections.id')
        ->leftJoin('teachers', 'time_tables.teacher_id', '=', 'teachers.id')
        ->leftJoin('registers', 'time_tables.student_id', '=', 'registers.id')
        ->first();
        // dd($data->toArray());
        return view('admin.timetable.edit', compact('data', 'courses', 'subjects', 'sections', 'teachers','students'));
    }

    // update the timetable
    public function update(Request $request, $id){
        $this->validation($request);
        $data = $this->get_request_data($request);
        TimeTable::where('id', $id)->update($data);
        return redirect()->route('admin.timetable')->with(['success' => 'Updated the data successfully']);
    }

    //  delete the timetable
    public function delete($id){
        TimeTable::where('id', $id)->delete();
        return redirect()->route('admin.timetable')->with(['success' => 'Deleted timetables successfully']);
    }

    // validate the request data
    private function validation($request){
        $rule = [
            'course_id' => 'required',
            'section_id' => 'required',
            'student_id' => 'required',
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
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'assistant_id' => $request->assistant_id,
            'date' => $request->date,
            'description' => $request->description,
        ];
    }
}
