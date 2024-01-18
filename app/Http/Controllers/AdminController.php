<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Teach;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Section;
use App\Models\Subject; 
use App\Models\Teacher;
use App\Models\Welcome;
use App\Models\Position;
use App\Models\Register;
use App\Models\AboutDesc;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use App\Models\Course_Detail;
use App\Models\CourseSection;
use App\Models\StudentProject;
use App\Http\Controllers\Controller;
use App\Models\CourseSubjectInstructor;

class AdminController extends Controller
{
    // return admin home page
    public function user_interface(){
        $welcome = Welcome::orderBy('updated_at')->paginate(5, ['*'], 'welcome');
        $about = About::get();
        $about_desc = AboutDesc::get()->first();
        // dd($about->toArray());
        return view('admin.main', compact('welcome', 'about', 'about_desc'));
    }

    // direct teacher main page
    public function teacher(){
        $teachers = Teacher::select('positions.name as position', 'teachers.*')
                    ->leftJoin('positions', 'positions.id', '=', 'teachers.position_id')
                    ->paginate(10, ['*'], 'teacher');
        $positions = Position::paginate(5, ['*'], 'position');

        // unique teacher with no duplicate subject
        $teaches = Teacher::whereHas('subjects')
        ->with(['subjects' => function ($query) {
            $query->select('subjects.*')->distinct();
        }])
        ->paginate(5, ['*'], 'teach');

        return view('admin.teacher', compact('teachers', 'positions', 'teaches'));
    }

    // direct course main page
    // direct course page
    public function course(){
        // dd($classes->toArray());
        $courses = Course::orderBy('updated_at', 'desc')->paginate(5, ['*'], 'course');
        $subjects = Subject::orderBy('updated_at', 'desc')->paginate(5, ['*'], 'subject');

        // fetch -> distinct teachers and subjects by courses table
        $classes = Course::whereHas('subjects.teachers')
        ->with(['subjects' => function ($query) {
            $query->select('subjects.*')
                ->distinct()
                ->selectRaw('subjects.id, subjects.name, subjects.created_at, subjects.updated_at');
        }, 'subjects.teachers' => function ($query) {
            $query->select('teachers.*')
                ->distinct()
                ->selectRaw('teachers.id, teachers.name, teachers.image, teachers.created_at, teachers.updated_at');
        }])
        ->paginate(5, ['*'], 'class');
    
        return view('admin.course', compact('courses', 'subjects', 'classes'));
    }

    // direct section page
    public function section(){
        $courseSections = CourseSection::orderBy('course_id')
                ->with('course', 'section')
                ->paginate(5, ['*'], 'course_section');
        $sections = Section::orderBy('start', 'asc')->paginate(5, ['*'], 'section');
        return view('admin.section', compact('sections', 'courseSections'));
    }

    // direct student page
    public function student(){
        $students = Register::all();
        
        return view('admin.student', ['students' => $students]);
    }

    // direct project page
    public function project(){
        $projects = Project::select('projects.*', 'courses.name as course')
                    ->leftJoin('courses', 'projects.course_id', '=', 'courses.id')
                    ->paginate(5);
        return view('admin.project', compact('projects'));
    }

    // direct gallery page
    public function gallery(){
        $gallerys = Gallery::paginate(10);
        return view('admin.gallery', compact('gallerys'));
    }

    // direct timetable page
    public function timetable(){
        $timetables = TimeTable::select('subjects.name as subject', 'registers.name as student', 
                        'sections.name as section', 'teachers.name as teacher', 'courses.name as course',
                        'date', 'time_tables.id as id')
                        ->leftJoin('courses', 'time_tables.course_id', '=', 'courses.id')
                        ->leftJoin('subjects', 'time_tables.subject_id', '=', 'subjects.id')
                        ->leftJoin('sections', 'time_tables.section_id', '=', 'sections.id')
                        ->leftJoin('teachers', 'time_tables.teacher_id', '=', 'teachers.id')
                        ->leftJoin('registers', 'time_tables.student_id', '=', 'registers.id')
                        ->get();
        // dd($timetables->toArray());
        return view('admin.timetable', compact('timetables'));
    }
    
}
