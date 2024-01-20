<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Register;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // direct to create page
    public function createPage(){
        $courses = Course::get();
        $sections = Section::get();
        return view('admin.student.create', compact('courses', 'sections'));
    }

    // create new student
    public function create(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
        'section_id' => 'required|exists:sections,id',
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'viber_phone' => 'nullable|string|max:255',
        'nrc' => 'required|string|max:255',
        'gender' => 'required|in:0,1',
        'date_of_birth' => 'required|date',
        'city' => 'required|string|max:255',
        'township' => 'required|string|max:255',
        'education' => 'required|string',
        'status' => 'required|in:0,1',
        'enroll_date' => 'required|date',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $this->get_request_data($request);
    if($request->hasfile('image')){
        $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
        $request->file('image')->storeas('public', $filename);
        $data["image"] = $filename;
    }
    Register::create($data);
    return redirect()->route('admin.student')->with(['success' => 'Add student '.$request->name.' successfully']);
}

    // get request data 
    private function get_request_data($request){ // change into array format
        return [
            'name' => $request->input('name'),
            'course_id' => $request->input('course_id'),
            'section_id' => $request->input('section_id'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'viber_phone' => $request->input('viber_phone'),
            'nrc' => $request->input('nrc'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'city' => $request->input('city'),
            'township' => $request->input('township'),
            'education' => $request->input('education'),
            'status' => $request->input('status'),
            'enroll_date' => $request->input('enroll_date'),
            'register_date' => now(),
            'image' => $request->image,
        ];
    }

    public function edit($id){
        $student = Register::findOrFail($id); // Change $register to $student
        $courses = Course::get();
        $sections = Section::get();
        return view('admin.student.edit', compact('student', 'courses', 'sections')); // Change $register to $student
    }
    

    public function delete($id){
        $record = Register::find($id);
        if ($record) {
            // Delete the record
            $record->delete();
            return redirect()->back()->with('success', 'Record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Record not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'section_id' => 'required|exists:sections,id',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'viber_phone' => 'nullable|string|max:255',
            'nrc' => 'required|string|max:255',
            'gender' => 'required|in:0,1',
            'date_of_birth' => 'required|date',
            'city' => 'required|string|max:255',
            'township' => 'required|string|max:255',
            'education' => 'required|string',
            'status' => 'required|in:0,1',
            'enroll_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasfile('image')){
            // Delete Old image 
            $old = Register::select('image')->where('id', $id)->first()->toArray();
            $old = $old['image'];
            if($old != null){
                Storage::delete('public/'.$old);
            }
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data = $filename;
        }

        Register::where('id', $id)->update([
            'name' => $request->input('name'),
            'course_id' => $request->input('course_id'),
            'section_id' => $request->input('section_id'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'viber_phone' => $request->input('viber_phone'),
            'nrc' => $request->input('nrc'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'city' => $request->input('city'),
            'township' => $request->input('township'),
            'education' => $request->input('education'),
            'status' => $request->input('status'),
            'enroll_date' => $request->input('enroll_date'),
            'image' => $data
        ]);
        return redirect()->route('admin.course')->with('success', 'Student updated successfully.');
    }
}
