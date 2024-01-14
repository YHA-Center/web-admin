<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Register;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // direct to create page
    public function createPage(){
        $courses = Course::get();
        $sections = Section::get();
        return view('admin.student.create', compact('courses', 'sections'));
    }

    // create new student
    public function create(Request $request){
        //dd($request->all());

        $request->merge([
            'register_date' => now(),
        ]);

        Register::create($request->all());

        return redirect()->route('admin.student')->with(['success' => 'Added new student successfully!']);
    }

    // get request data 
    private function get_request_data($request){
        return [
            'name' => $request->name,
            'course_id' => $request->course_id,
            'section_id' => $request->section_id,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'viber_phone' => $request->viber_phone,
            'f_nrc' => $request->f_nrc,
            's_nrc' => $request->s_nrc,
            't_nrc' => $request->t_nrc,
            'number_nrc' => $request->number_nrc,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'register_date' => $request->register_date,
            'end_date' => $request->end_date,
            'city' => $request->city,
            'township' => $request->township,
            'education' => $request->education,
            'image' => $request->image,
        ];
    }
}
