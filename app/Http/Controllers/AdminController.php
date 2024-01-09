<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Teach;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Welcome;
use App\Models\Position;
use App\Models\AboutDesc;
use Illuminate\Http\Request;
use App\Models\Course_Detail;
use App\Models\StudentProject;
use App\Http\Controllers\Controller;
use App\Models\CourseSubjectInstructor;

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
        $teachers = Teacher::select('positions.name as position', 'teachers.*')
                    ->leftJoin('positions', 'positions.id', '=', 'teachers.position_id')
                    ->paginate(10, ['*'], 'teacher');
        $positions = Position::paginate(5, ['*'], 'position');

        // unique teacher with no duplicate subject
        $teaches = Teacher::with(['subjects' => function ($query) {
            $query->select('subjects.*')->distinct();
        }])
        ->paginate(5, ['*'], 'teach');

        return view('admin.teacher', compact('teachers', 'positions', 'teaches'));
    }

    // direct course main page
    // direct course page
    public function course()
    {
        // dd($classes->toArray());
        $courses = Course::orderBy('updated_at', 'desc')->paginate(5, ['*'], 'course');
        $subjects = Subject::orderBy('updated_at', 'desc')->paginate(5, ['*'], 'subject');
    
        return view('admin.course', compact('courses', 'subjects'));
    }
    
}
