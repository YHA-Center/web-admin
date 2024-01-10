<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    // direct create page
    public function createPage(){
        $courses = Course::get();
        $sections = Section::get();
        return view('admin.courseSection.create', compact('courses', 'sections'));
    }

    // create class section
    public function create(Request $request){

    }

    // direct edit page
    public function edit($id){

    }

    // update the section class
    public function update(Request $id){

    }

    // delete the class section
    public function delete($id){

    }
}
