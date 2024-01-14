<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

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
}
