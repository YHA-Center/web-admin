<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Register;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function courseList(Request $request){
        $course_id = $request->status;

        $data = Course::where('id', $course_id)
                ->with('subjects', 'sections')
                ->get();
        $students = Register::where('course_id', $course_id)
                    ->get();
        
        return [$data, $students];
    }
}
