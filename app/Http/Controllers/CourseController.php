<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\course_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    // course create page
    public function createPage(){
        $courseTypes = course_type::select('id', 'name')->get();
        return view('admin.course.create', ['courseTypes' => $courseTypes]);
    }
    // edit course page
    public function edit($id){
        $data = Course::where('id', $id)->first();
        return view('admin.course.edit', compact('data'));
    }
    // create course
    public function create(Request $request)
    {
        $this->validation($request, "create");
        $data = $this->get_request_data($request);
        $data['course_type'] = $request->input('course_type');
        if ($request->hasfile('image')) {
            $filename = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $filename);
            $data["image"] = $filename;
        }
        Course::create($data);
        return redirect()->route('admin.course')->with(['success' => 'Added course ' . $data['name']]);
    }

    // update course
    public function update(Request $request){
        $this->validation($request, "update");
        $data = $this->get_request_data($request);
        $id = $request->id;
        if($request->hasfile('image')){
            // Delete Old image 
            $old = Course::select('image')->where('id', $id)->first()->toArray();
            $old = $old['image'];
            if($old != null){
                Storage::delete('public/'.$old);
            }
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
        }
        Course::where('id', $id)->update($data);
        return redirect()->route('admin.course')->with(['success' => 'Updated instructor '.$request->name.' successfully']);
        
    }
    // delete course
    public function delete($id){
        $course = Course::where('id', $id)->first();
        $old = Course::select('image')->where('id', $id)->first()->toArray();
        $old = $old['image'];
        if($old != null){
            Storage::delete('public/'.$old);
        }
        Course::where('id', $id)->delete();
        return redirect()->route('admin.course')->with(['success' => 'Deleted '.$course->name.' course.']);
    }




    // get request data
    private function get_request_data($request){
        $array = [
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'normal_price' => $request->normal_price,
            'special_price' => $request->special_price,
        ];
        return $array;
    }
    // validation
    private function validation($request, $mode){
        $rule = [
            'name' => 'required|min:1|unique:courses,name,'.$request->id,
            'description' => 'required|min:1',
            'image' => ($mode == 'create') ? 'required|file|mimes:jpg,png,jpeg,webp' : 'file|mimes:jpg,png,jpeg,webp',
            'duration' => 'required|min:1',
            'normal_price' => 'required|min:1',
            'special_price' => 'required|min:1',
        ];
        $message = [
            'name.required' => 'Course name is required',
            'normal_price.required' => 'Course normal price is required',
            'special_price.required' => 'Course special price is required',
            'description.required' => 'Course description is required',
            'image.required' => 'Course image is required',
            'duration.required' => 'Course duration is required',
            'name.min' => 'Course name must have minimum 5 letters',
            'description.min' => 'Course description must have minimun 5 letters',
            'duration.min' => 'Course duration must have minimum 2 letters',
            'special_price.min' => 'Course special price must have minimum 4 number',
        ];
        Validator::make($request->all(), $rule, $message)->validate();
    }
}
