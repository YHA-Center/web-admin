<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // direct class create 
    public function createPage(){
        $courses = Course::get();
        $subjects = Subject::get();
        return view('admin.class.create', compact('courses', 'subjects'));
    }

    // create class

}
