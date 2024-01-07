<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

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

}
