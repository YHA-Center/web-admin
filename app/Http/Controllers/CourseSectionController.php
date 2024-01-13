<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CourseSectionController extends Controller
{
    // direct create page
    public function createPage(){
        $courses = Course::get();
        $sections = Section::orderBy('start')->get();
        return view('admin.courseSection.create', compact('courses', 'sections'));
    }

    // create class section
    public function create(Request $request){
        // dd($request->all());
        Validator::make($request->all(), [
            'course_id' => 'required',
            'section_id' => [
                'required',
                Rule::unique('course_sections')->where(function ($query) use ($request) {
                    return $query->where('course_id', $request->course_id);
                }),
            ],
        ])->validate();
        $data = [
            'course_id' => $request->course_id,
            'section_id' => $request->section_id,
        ];
        CourseSection::create($data);
        return redirect()->route('admin.section')->with(['success' => 'Created new class section successfully!']);
    }

    // direct edit page
    public function edit($id){
        $sections = Section::orderBy('start')->get();
        $data = CourseSection::where('id', $id)->with('course', 'section')->first();
        // dd($data->toArray());
        return view('admin.courseSection.edit', compact('sections', 'data')); 
    }

    // update the section class
    public function update(Request $request){
        // dd($request->all());
        Validator::make($request->all(), [
            'section_id' => [
                'required',
                Rule::unique('course_sections')->where(function ($query) use ($request) {
                    return $query->where('course_id', $request->course_id);
                }),
            ],
        ])->validate();
        $id = $request->course_id;
        $data = [
            'section_id' => $request->section_id,
        ];
        CourseSection::where('id', $id)->update($data);
        return redirect()->route('admin.section')->with(['success' => 'Created new class section successfully!']);
    }

    // delete the class section
    public function delete($id){

    }
}
