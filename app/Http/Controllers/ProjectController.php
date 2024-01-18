<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    // direct student project create page
    public function createPage(){
        $courses = Course::get();
        return view('admin.project.create', compact('courses'));
    }
    // create student project
    public function create(Request $request){

        $data = $this->get_request_data($request);
        $rule = [
            'title' => 'required|min:3|unique:projects,title,'.$request->id,
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'course' => 'required',
            'desc' => 'required|min:5',
        ];
        Validator::make($request->all(), $rule)->validate();
        if($request->hasfile('image')){
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
        }
        Project::create($data);
        return redirect()->route('admin.project')->with(['success' => 'Added student project successfully!']);
    }

    // delete student project
    public function delete($id){
        Project::where('id', $id)->delete();
        return back()->with(['success' => 'Deleted student project successfully!']);
    }

    // edit student project
    public function edit($id){
        $courses = Course::get();
        $data = Project::where('id', $id)->first();
        return view('admin.project.edit', compact('data', 'courses'));
    }

    // update student project
    public function update(Request $request, $id){
        $rule = [   // validation rule
            'title' => 'required|min:3|unique:projects,title,'.$request->id,
            'image' => 'image|mimes:png,jpeg,jpg',
            'course' => 'required',
            'desc' => 'required|min:5',
        ];
        Validator::make($request->all(), $rule)->validate();  // validation action
        $data = $this->get_request_data($request); // get data and turn into array
        if($request->hasfile('image')){
            // Delete Old image 
            $old = Project::select('image')->where('id', $id)->first()->toArray(); // select old image
            $old = $old['image'];
            if($old != null){
                Storage::delete('public/'.$old);  // delete old image from storage
            }
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename); // get new image
            $data["image"] = $filename; // set new image
        }
        Project::where('id', $id)->update($data); // update the database
        return redirect()->route('admin.project')->with(['success' => 'Updated student project successfully']); // redirect to project page
    }

    // student project data
    private function get_request_data($request){
        $arr = [
            'title' => $request->title,
            'course_id' => $request->course,
            'desc' => $request->desc,
            'github' => $request->github,
            'demo' => $request->demo,
        ];
        return $arr;
    }

}
