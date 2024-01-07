<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Welcome;
use App\Models\AboutDesc;
use App\Models\Course_Detail;
use Illuminate\Http\Request;
use App\Models\StudentProject;

class AdminController extends Controller
{
    // return admin home page
    public function user_interface(){
        $welcome = Welcome::orderBy('updated_at')->paginate(5);
        $about = About::get();
        $about_desc = AboutDesc::get()->first();
        $projects = StudentProject::orderBy('updated_at', 'desc')->paginate(6);
        // dd($about->toArray());
        return view('admin.user_interface.main', compact('welcome', 'about', 'about_desc', 'projects'));
    }

    // direct teacher main page
    public function teacher(){
        $teachers = Teacher::paginate(10);
        return view('admin.teacher', compact('teachers'));
    }

    // direct course main page
    // direct course page
    public function course(){
        $classes = Course_Detail::get();
        // dd($classes);
        $courses = Course::paginate(5);
        $subjects = Subject::paginate(5);
        return view('admin.course', compact('courses', 'subjects', 'classes'));
    }
}
