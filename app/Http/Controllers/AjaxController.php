<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function courseList(Request $request){
        $course_id = $request->status;

        $data = Course::where('id', $course_id)
                ->with('subjects', 'sections')
                ->get();
        // if($request->status == 'asc'){
        //     // $data = Product::orderBy('created_at', 'asc')->get();
        // }
        // if($request->status == 'desc'){
        //     // $data = Product::orderBy('created_at', 'desc')->get();
        // }
        // return $data;
        return $data;
    }
}
